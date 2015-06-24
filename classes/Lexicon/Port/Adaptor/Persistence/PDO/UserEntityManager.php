<?php

namespace Lexicon\Port\Adaptor\Persistence\PDO;

class UserEntityManager {

    private $conn;
    private $user;

    public function __construct( $conn, \Lexicon\Port\Adaptor\Data\Lexicon\User $user) {
        $this->conn = $conn;
        $this->user = $user;
    }
    
    public function getUser() {
        return $this->user;
    }

    public function findById( $id ) {
        $user = NULL;
        $query = "SELECT * FROM `t_users` WHERE `id`= ?;";
        $sth = $this->conn->prepare($query);
        $sth->execute(array($id));
        while($row = $sth->fetch()) {
            $user = $this->user->fromXmlStr($row["xmlview"]);
        }
        return $user;
    }
    
    public function createUser( \Lexicon\Port\Adaptor\Data\Lexicon\User $user ) {
        $locator = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
        $conn = $locator->locate("DB_CONNECT");
        $handler = $locator->locate("VALIDATION_HANDLER");
        $user->validateType( $handler );
        if($handler->hasErrors()) {
            throw new Exception( $handler, $code );
        } else {
            $query = "INSERT INTO `t_users` (id,first_name,gender,last_name,name,email,locale,link,timezone,updated_time,verified,xmlview) VALUES(?,?,?,?,?,?,?,?,?,?,?,?);";
            $params = array(
                $user->getId(),
                $user->getFirstName() ? $user->getFirstName() : "",
                $user->getGender() ? $user->getGender() : "",
                $user->getLastName() ? $user->getLastName() : "",
                $user->getName() ? $user->getName() : "",
                $user->getEmail() ? $user->getEmail() : "",
                $user->getLocale() ? $user->getLocale() : "",
                $user->getLink() ? $user->getLink() : "",
                $user->getTimezone() ? $user->getTimezone() : "",
                $user->getUpdatedTime() ? $user->getUpdatedTime() : "",
                $user->getVerified() ? $user->getVerified() : "",
                $user->toXmlStr()
            );
            //print($query);print_r($params);exit;
            $sth = $conn->prepare($query);
            $sth->execute($params);
            return $user;
        }
    }

    public function updateUser( \Lexicon\Port\Adaptor\Data\Lexicon\User $user ) {
        $locator = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
        $conn = $locator->locate( "DB_CONNECT" );
        $handler = $locator->locate( "VALIDATION_HANDLER" );
        $user->validateType( $handler );
        if($handler->hasErrors()) {
            throw new Exception( $handler, $code );
        } else {
            $query = "UPDATE `t_users` SET first_name = ?,gender = ?,last_name = ?,name = ?,email = ?,locale = ?,link = ?,timezone = ?,updated_time = ?,verified = ?,xmlview = ? WHERE id = ?;";
            $params = array(
                $user->getFirstName() ? $user->getFirstName() : "",
                $user->getGender() ? $user->getGender() : "",
                $user->getLastName() ? $user->getLastName() : "",
                $user->getName() ? $user->getName() : "",
                $user->getEmail() ? $user->getEmail() : "",
                $user->getLocale() ? $user->getLocale() : "",
                $user->getLink() ? $user->getLink() : "",
                $user->getTimezone() ? $user->getTimezone() : "",
                $user->getUpdatedTime() ? $user->getUpdatedTime() : "",
                $user->getVerified() ? $user->getVerified() : "",
                $user->toXmlStr(),
                $user->getId()
            );
            
            //print($query);print_r($params);exit;
            $sth = $conn->prepare($query);
            $sth->execute($params);
            return $user;
        }
    }

}