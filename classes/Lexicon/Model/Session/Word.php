<?php

namespace Lexicon\Model\Session;

class Word extends \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word {
    
    public function addResult( $result ) {
        switch( $result ) {
            case "true":
                $this->CAttempts++;
                $this->TAttempts++;
                $this->updateStatus();
                break;
            case "false":
                $this->CAttempts = 0;
                $this->FAttempts++;
                $this->setStatus("new");
                break;
            case "stop":
                $this->CAttempts++;
                $this->TAttempts++;
                $this->setStatus("used");
                break;
        }
        return $this->getStatus();
    }
    
    public function updateStatus() {
        $lc = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
        if( $this->TAttempts >= $lc->locate("NEXT_RULE") ) {
            $this->setStatus("used");
        }
        return $this->getStatus();
    }
    
}