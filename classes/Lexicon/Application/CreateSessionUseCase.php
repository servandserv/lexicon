<?php

namespace Lexicon\Application;

class CreateSessionUseCase {

    public function __construct() {
    }

    public function execute( $session ) {
        $em = \Lexicon\Infrastructure\Helpers\Locator::getInstance()->locate("SESSION_ENTITY_MANAGER_FACTORY");
        $session = $em->createSession( $session );
        return $session;
    }

}