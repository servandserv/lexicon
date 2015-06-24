<?php

    require_once __DIR__.'/../conf/bootstrap.php';
    require_once __DIR__.'/../conf/conf.php';

    if(!isset($_SESSION["LEXICON_USER"])) {
        header("Location: index.php");
        exit;
    } else {
        $userId = $_SESSION["LEXICON_USER"];
        // get query params
        $code = $_GET["code"];
        // search session
        $usecase = new \Lexicon\Application\NextUseCase();
        if( $word = $usecase->execute($userId,$code)) {
            $word->setPI("stylesheets/Lexicon/Next.grid.xsl");
            //$word->setDesc(trim($word->getDesc()));
            header("Content-Type: text/xml; charset=utf-8");
            $xmlstr = $word->toXmlStr();
            $matches = [];
            preg_match("/<desc>(.*)<\/desc>/ms",$xmlstr,$matches);
            //error_log(print_r($matches,true));
            $str_new = preg_replace("/\t/","",$matches[1]);
            $str_new = preg_replace("/\n{1,}/","\n",$str_new);
            $str_new = preg_replace("/\n/","<br xmlns='http://www.w3.org/1999/xhtml'/>",$str_new);
            $str_new = preg_replace("/\/>\s+?([1-9I])/","/><br xmlns='http://www.w3.org/1999/xhtml'/>$1",$str_new);
            $xmlstr = str_replace($matches[1],$str_new,$xmlstr);
            //$xmlstr = preg_replace("/<desc>.+?(\\n).+<\/desc>/","<br/>",$xmlstr);
            echo $xmlstr;
            exit;
        } else throw new Exception( "User session not found", 454 );
    }