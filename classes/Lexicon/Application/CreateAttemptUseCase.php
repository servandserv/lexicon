<?php

namespace Lexicon\Application;

class CreateAttemptUseCase {

    public function __construct() {
    }

    public function execute( $userId, $code, $word, $result ) {
        $em = \Lexicon\Infrastructure\Helpers\Locator::getInstance()->locate('SESSION_ENTITY_MANAGER_FACTORY',new \Lexicon\Model\Session());
        if( $session = $em->findSession( $userId, $code ) ) {
            return $session->addAttempt( $word, $result );
        } else throw new \Exception( "User session not found", 454 );
    }

}