<?php

namespace Lexicon\Port\Adaptor\Persistence\PDO;

class EnRuDictEntityManager {

    private $conn;
    private $word;

    public function __construct( $conn, \Lexicon\Port\Adaptor\Data\Lexicon\Word $word ) {
        $this->conn = $conn;
        $this->word = $word;
    }
    
    public function findWord( $w ) {
        $word = null;
        $query = "SELECT * FROM `t_dict_en_ru` WHERE word = ?;";
        $sth = $this->conn->prepare($query);
        $sth->execute(array($w));
        while($row = $sth->fetch()) {
            $word = $this->word->fromXmlStr($row["xmlview"]);
            $trans = $word->getTrans();
            //$trans = str_replace(array("\xD1\x86","\xD1\x85","\xD0\xAB","\xE2\x95\x9A","\xE2\x96\88",),array("ʌ","'","ə","ɔː(r)","ː"),$trans);
            //$trans = str_replace(array("\xd1\x85"),array("\xcc\x88\xc9\xaa\xcb\x88"),$trans);
            $word->setTrans($trans);
            //$word->setDesc(preg_replace("/(\n)/", "<br/>", $word->getDesc()));
        }
        return $word;
    }
}