<?php

namespace Lexicon\Port\Adaptor\Persistence\PDO;

class FreqEnDictEntityManager {

    private $conn;
    private $session;

    public function __construct( $conn, \Lexicon\Port\Adaptor\Data\Lexicon\Session $session ) {
        $this->conn = $conn;
        $this->session = $session;
    }
    
    public function findNewKeys( $count ) {
        $keys = [];
        $query = "SELECT f.word FROM `t_en_frequency` as f LEFT JOIN t_words as w ON w.word = f.word AND w.user_id = ? AND w.code = ? WHERE w.word IS NULL ORDER BY f.autoid LIMIT 0,".intval($count).";";
        $sth = $this->conn->prepare($query);
        $sth->execute(array($this->session->getUserId(),$this->session->getCode()));
        while($row = $sth->fetch()) {
            $keys[] = $row["word"];
        }
        return $keys;
    }
}