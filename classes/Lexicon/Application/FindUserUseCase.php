<?php

namespace Lexicon\Application;

class FindUserUseCase {

    public function __construct() {
    }

    public function execute( $id ) {
        $em = \Lexicon\Infrastructure\Helpers\Locator::getInstance()->locate('USER_ENTITY_MANAGER_FACTORY');
        if( $user = $em->findById( $id ) ) {
            return $user;
        } else throw new \Exception( "User $id not found", 454 );
    }

}