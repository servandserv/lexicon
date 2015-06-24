<?php

namespace Lexicon\Application;

class NextUseCase {

    public function __construct() {
    }

    public function execute( $userId, $code ) {
        $em = \Lexicon\Infrastructure\Helpers\Locator::getInstance()->locate('SESSION_ENTITY_MANAGER_FACTORY',new \Lexicon\Model\Session());
        if( $session = $em->findSession( $userId, $code ) ) {
            if( $attempt = $session->getNextAttempt( new \Lexicon\Port\Adaptor\Data\Lexicon\Attempt() ) ) {
                return $attempt;
            } else throw new \Exception( "Next word error", 550 );
        } else throw new \Exception( "User session not found", 454 );
    }

}