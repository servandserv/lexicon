<?php

    require_once __DIR__.'/../conf/bootstrap.php';
    require_once __DIR__.'/../conf/conf.php';

    if(!isset($_SESSION["LEXICON_USER"])) {
        header("Location: index.php");
        exit;
    } else {
        $session = new \Lexicon\Port\Adaptor\Data\Lexicon\Session();
        $session->setUserId($_SESSION["LEXICON_USER"]);
        $session->setCode("en_ru");
        $session->setDtStart(date("Y-m-d h:i:s"));
        $session->setUsed(0);
        $session->setNextRule($lc->locate("NEXT_RULE"));
        $session->setRepeatRule($lc->locate("REPEAT_RULE"));
        $session->setRepeatCounter(0);
        $session->setAttempts(0);
        $usecase = new \Lexicon\Application\CreateSessionUseCase();
        if( $session = $usecase->execute( $session ) ) {
            header("Location: attemptNext.php?code=".$session->getCode()."#word");
            exit;
        } else throw new \Exception( "Error on create new session", 550 );
    }