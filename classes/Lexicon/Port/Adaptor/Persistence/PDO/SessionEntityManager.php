<?php

namespace Lexicon\Port\Adaptor\Persistence\PDO;

class SessionEntityManager {

    private $conn;
    private $session;

    public function __construct( $conn, \Lexicon\Port\Adaptor\Data\Lexicon\Session $session) {
        $this->conn = $conn;
        $this->session = $session;
    }
    
    public function getSession() {
        return $this->session;
    }

    public function findUserSessions( $userId ) {
        $query = "SELECT * FROM `t_sessions` WHERE `user_id`= ?;";
        $sth = $this->conn->prepare($query);
        $sth->execute(array($userId));
        $sessions = new \Lexicon\Port\Adaptor\Data\Lexicon\Session\Sessions();
        while($row = $sth->fetch()) {
            $session = $this->session->fromXmlStr($row["xmlview"]);
            $sessions->setSession($session);
        }
        return $sessions;
    }
    
    public function findSession( $userId, $code ) {
        $session = NULL;
        $query = "SELECT * FROM `t_sessions` WHERE `user_id`= ? AND code = ?;";
        $sth = $this->conn->prepare($query);
        $sth->execute(array($userId, $code));
        while($row = $sth->fetch()) {
            $session = $this->session->fromXmlStr($row["xmlview"]);
            $session->setLastmod($row["lastmod"]);
        }
        return $session;
    }
    
    public function createSession( \Lexicon\Port\Adaptor\Data\Lexicon\Session $session ) {
        $locator = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
        $conn = $locator->locate("DB_CONNECT");
        $handler = $locator->locate("VALIDATION_HANDLER");
        $session->validateType( $handler );
        if($handler->hasErrors()) {
            throw new \Exception( $handler, $code );
        } else {
            $qb = $locator->locate("DB_QUERY_BUILDER",[]);
            $query = $qb->insert()
                ->t("t_sessions")
                ->set()
                    ->c("user_id")->eq()->val($session->getUserId(),$qb::NOT_NULL)
                    ->c("code")->eq()->val($session->getCode(),$qb::NOT_NULL)
                    ->c("dt_start")->eq()->val($session->getDtStart(),$qb::NOT_NULL)
                    ->c("used")->eq()->val($session->getUsed(),$qb::NOT_NULL)
                    ->c("attempts")->eq()->val($session->getAttempts(),$qb::NOT_NULL)
                    ->c("xmlview")->eq()->val($session->toXmlStr())
                ->fi();
            //print($query);print_r($params);exit;
            $sth = $conn->prepare($query);
            $sth->execute($qb->getParams());
            return $this->findSession($session->getUserId(),$session->getCode());
        }
    }
    
    public function updateSession( \Lexicon\Port\Adaptor\Data\Lexicon\Session $session ) {
        $locator = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
        $conn = $locator->locate("DB_CONNECT");
        $handler = $locator->locate("VALIDATION_HANDLER");
        $session->validateType( $handler );
        if($handler->hasErrors()) {
            throw new \Exception( $handler, $code );
        } else {
            $qb = $locator->locate("DB_QUERY_BUILDER",[]);
            $query = $qb->update()
                ->t("t_sessions")
                ->set()
                    ->c("used")->eq()->val($session->getUsed(),$qb::NOT_NULL)
                    ->c("attempts")->eq()->val($session->getAttempts(),$qb::NOT_NULL)
                    ->c("xmlview")->eq()->val($session->toXmlStr())
                ->where()
                    ->c("user_id")->eq()->val($session->getUserId())
                    ->andTrue()
                    ->c("code")->eq()->val($session->getCode())
                ->fi();
            //print($query);print_r($params);exit;
            $sth = $conn->prepare($query);
            $sth->execute($qb->getParams());
            return $this->findSession($session->getUserId(),$session->getCode());
        }
    }
}