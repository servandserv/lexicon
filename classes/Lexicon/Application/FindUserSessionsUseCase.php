<?php

namespace Lexicon\Application;

class FindUserSessionsUseCase {

    public function __construct() {
    }

    public function execute( $id ) {
        $em = \Lexicon\Infrastructure\Helpers\Locator::getInstance()->locate('SESSION_ENTITY_MANAGER_FACTORY');
        if( $sessions = $em->findUserSessions( $id ) ) {
            return $sessions;
        } else throw new \Exception( "User $id not found", 404 );
    }

}