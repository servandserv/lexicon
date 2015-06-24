<?php

namespace Lexicon\Model;

class Session extends \Lexicon\Port\Adaptor\Data\Lexicon\Session {

    public function getNextAttempt( \lexicon\Port\Adaptor\Data\Lexicon\Attempt $attempt ) {
        
        $word = call_user_func($this->createSelectionStrategy());
        $lc = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
        // retrieve history data
        $em = $lc->locate("WORDS_ENTITY_MANAGER_FACTORY", $this);
        if($w = $em->findWord( $word, new \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word() ) ) {
            $this->setWord( $w );
        }
        // retrieve dictionary data
        $em = $lc->locate( "DICT_ENTITY_MANAGER_FACTORY", $this );
        if( $word && $dword = $em->findWord( $word ) ) {
            //error_log($dword->getTrans());
            $attempt->setWord( $dword );
        } else throw new \Exception( "Next word not found", 550 );
        $attempt->setSession($this);
        return $attempt;
    }
    
    public function addAttempt( $word, $result ) {
        // retrieve word from history
        $lc = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
        $em = $lc->locate("WORDS_ENTITY_MANAGER_FACTORY", $this);
        if(!$w = $em->findWord( $word, new \Lexicon\Model\Session\Word() ) ) {
            // if not create one
            $w = new \Lexicon\Model\Session\Word();
            $w->setWord( $word );
            if(!$w = $em->createWord( $w )) throw new \Exception("Create word error",550);
        }
        // add stat and update data
        $status = $w->getStatus();
        $w->addResult( $result );
        $em->updateWord( $w );
        // add stat to session and update data
        $this->setRepeatRule( $status === 'new' ? 0 : 1 );
        $this->setWordArray( [] );
        $this->setAttempts( $em->countAttempts() );
        $this->setUsed( $em->countUsed() );
        $this->addLast( $w );
        $em = $lc->locate("SESSION_ENTITY_MANAGER_FACTORY", $this);
        return $em->updateSession( $this );
    }
    
    private function selectNew() {
        $lc = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
        // update new words buffer
        $em = $lc->locate("WORDS_ENTITY_MANAGER_FACTORY", $this);
        $keys = $em->findNewKeys( $lc->NEW_WORDS_BUFFER );

        //if buffer size less then NEW_WORDS_BUFFER
        $rest = $lc->locate("NEW_WORDS_BUFFER") - count($keys);
        if($rest > 0) {
            //upload new words
            $em = $lc->locate("FREQ_DICT_ENTITY_MANAGER_FACTORY", $this);
            if( $new_keys = $em->findNewKeys( $rest ) ) {
                $keys = array_merge( $keys, $new_keys );
            }
        }
        
        // select only oldest new words
        if( count($keys) > count( $this->Last ) ) {
            $keys = array_values(array_diff( $keys, $this->Last ));
        }
        
        //случайным образом достаем из остатка слово для изучения
        $rand = rand(0,count($keys)-1);
        $word = $keys[$rand];
        $this->setRepeatCounter(1);
        return $word;
    }
    
    private function selectUsed() {
        $lc = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
        // repeat used words
        $this->setRepeatCounter(0);
        // retrieve oldest used word
        $em = $lc->locate("WORDS_ENTITY_MANAGER_FACTORY",$this);
        $word = $em->findOldestUsed();
        return $word;
    }
    
    private function createSelectionStrategy() {
        // if used less then REPEAT_START_POSITION
        $lc = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
        $em = $lc->locate("WORDS_ENTITY_MANAGER_FACTORY", $this);
        $used = $em->countUsed();
        if( $this->getRepeatCounter() != $this->getRepeatRule() || $used <= $lc->locate("REPEAT_START_POSITION") ) {
            return function() {
                return $this->selectNew();
            };
        } else {
            return function() {
                return $this->selectUsed();
            };
        }
    }
    
    public function addLast( $w ) {
        $lc = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
        if( $w->getStatus() == "new" && !in_array( $w->getWord(), $this->Last ) ) {
            $this->Last[] = $w->getWord();
        }
        while( count( $this->Last ) > $lc->locate("NEW_WORDS_BUFFER") / 2 ) {
            array_shift( $this->Last );
        }
        return $this->Last;
    }
}