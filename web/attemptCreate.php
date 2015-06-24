<?php

    require_once __DIR__.'/../conf/bootstrap.php';
    require_once __DIR__.'/../conf/conf.php';

    if(!isset($_SESSION["LEXICON_USER"])) {
        header("Location: index.php");
        exit;
    } else {
        $code = $_POST["code"];
        $word = $_POST["word"];
        $result = $_POST["result"];
        
        if( !$result ) {
            header("Location: attemptNext.php?code=".$code);
            exit;
        }
        
        $usecase = new \Lexicon\Application\CreateAttemptUseCase();
        if( $session = $usecase->execute( $_SESSION["LEXICON_USER"], $code, $word, $result ) ) {
            header("Location: attemptNext.php?code=".$code."#word");
            exit;
        } else throw new \Exception( "Error on create new session", 550 );
    }