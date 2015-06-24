<?php

namespace Lexicon\Port\Adaptor\Persistence\PDO;

class WordsEntityManager {

    private $conn;
    private $session;

    public function __construct( $conn, \Lexicon\Port\Adaptor\Data\Lexicon\Session $session ) {
        $this->conn = $conn;
        $this->session = $session;
    }
    
    public function findWord( $word,  $w ) {
        $query = "SELECT * FROM `t_words` WHERE user_id = ? AND code = ? AND word = ?;";
        $sth = $this->conn->prepare($query);
        $sth->execute(array($this->session->getUserId(), $this->session->getCode(), $word));
        if($row = $sth->fetch()) {
            $w->setId($row["id"]);
            $w->setUserId($this->session->getUserId());
            $w->setCode($this->session->getCode());
            $w->setWord($word);
            $w->setCAttempts($row["c_attempts"]);
            $w->setTAttempts($row["t_attempts"]);
            $w->setFAttempts($row["f_attempts"]);
            $w->setStatus($row["status"]);
            $w->setLastmod($row["lastmod"]);
            return $w;
        } else return null;
    }
    
    public function createWord( \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word $w ) {
        $query = "INSERT INTO `t_words` (`user_id`,`code`,`word`,`c_attempts`,`t_attempts`,`f_attempts`,`status`) VALUES (?,?,?,?,?,?,?);";
        $sth = $this->conn->prepare($query);
        $sth->execute( array( $this->session->getUserId(), $this->session->getCode(), $w->getWord(), 0, 0, 0, "new" ) );
        return $this->findWord( $w->getWord(), $w );
    }
    
    public function updateWord( \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word $w ) {
        $query = "UPDATE `t_words` SET `c_attempts` = ?, `t_attempts` = ?, `f_attempts` = ?, `status` = ? WHERE `user_id` = ? AND `code` = ? AND `word` = ?";
        $sth = $this->conn->prepare($query);
        $sth->execute( array( 
            $w->getCAttempts(), 
            $w->getTAttempts(), 
            $w->getFAttempts(), 
            $w->getStatus(),
            $this->session->getUserId(), 
            $this->session->getCode(), 
            $w->getWord() ) );
        return $this->findWord( $w->getWord(), $w );
    }
    
    public function countUsed() {
        $query = "SELECT count(*) AS total FROM `t_words` WHERE status='used' AND user_id = ? AND code = ?;";
        $sth = $this->conn->prepare($query);
        $sth->execute(array($this->session->getUserId(), $this->session->getCode()));
        while($row = $sth->fetch()) {
            return $row["total"];
        }
        return 0;
    }
    
    public function countAttempts() {
        $query = "SELECT sum(t_attempts) AS tr, sum(f_attempts) AS fl FROM `t_words` WHERE user_id = ? AND code = ?;";
        $sth = $this->conn->prepare($query);
        $sth->execute(array($this->session->getUserId(), $this->session->getCode()));
        while($row = $sth->fetch()) {
            return $row["tr"] + $row["fl"];
        }
        return 0;
    }
    
    public function findNewKeys( $count ) {
        $keys = [];
        $query = "SELECT * FROM `t_words` WHERE status='new' AND user_id = ? AND code = ? ORDER BY id LIMIT 0,$count;";
        $sth = $this->conn->prepare($query);
        $sth->execute(array($this->session->getUserId(), $this->session->getCode()));
        while($row = $sth->fetch()) {
            $keys[] = $row["word"];
        }
        return $keys;
    }
    
    public function findOldestUsed() {
        $query = "SELECT * FROM `t_words` WHERE status='used' AND user_id = ? AND code = ? ORDER BY lastmod LIMIT 0,1;";
        $sth = $this->conn->prepare($query);
        $sth->execute(array($this->session->getUserId(), $this->session->getCode()));
        while($row = $sth->fetch()) {
            return $row["word"];
        }
    }
}