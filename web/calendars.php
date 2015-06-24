<?php

    require_once __DIR__.'/../conf/bootstrap.php';
    require_once __DIR__.'/../conf/conf.php';

    // the iCal date format. Note the Z on the end indicates a UTC timestamp.
    define('DATE_ICAL', 'Ymd\THis\Z');
    define('DATE_ALLDAY_ICAL', 'Ymd');

    $matches = [];
    $cal = preg_match("/calendars\/(\d+)\.ics/",$_SERVER["SCRIPT_URL"],$matches);
    if(!isset($matches[1])) throw new \Exception( "Calendar resource not found", 454 );
    
    // Set the headers
    header("Content-type: text/calendar; charset=utf-8");
    header("Content-Disposition: inline; filename=".$matches[1].".ics");
    $ics = "BEGIN:VCALENDAR\n";
    $ics .= "METHOD:PUBLISH\n";
    $ics .= "VERSION:2.0\n";
    $ics .= "PRODID:-//Battleship/Lexi//EN\n";
    
    $usecase = new \Lexicon\Application\FindUserSessionsUseCase();
    if( $sessions = $usecase->execute( $matches[1] ) ) {
        $ss = $sessions->getSession();
        foreach($ss as $s) {
            $ics .= "BEGIN:VEVENT\n";
            $ics .= "UID:".$matches[1]."\n";
            $ics .= "SUMMARY:Start learning English words\n";
            $ics .= "DESCRIPTION: Изучил ".$s->getUsed()." слов английского языка.\n";
            $ics .= "http://www.battleship.ru/lexi?code=".$s->getCode()."\n";
            $ics .= "DTSTART:".date(DATE_ALLDAY_ICAL, strtotime($s->getDtStart()))."\n";
            $ics .= "DTEND:".date(DATE_ALLDAY_ICAL, strtotime($s->getLastmod())+24*60*60)."\n";
            $ics .= "LAST-MODIFIED:".date(DATE_ICAL, strtotime($s->getLastmod()))."\n";
            $ics .= "END:VEVENT\n";
        }
   }
   
   $ics .= "END:VCALENDAR\n";
   echo $ics;
   exit;