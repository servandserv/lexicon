<?php

namespace Lexicon\Application;

class RegisterUserUseCase {

    public function __construct() {
    }

    public function execute( $info ) {
        $em = \Lexicon\Infrastructure\Helpers\Locator::getInstance()->locate("USER_ENTITY_MANAGER_FACTORY");
        if( $user = $em->findById( $info["id"] ) ) {
            // обновим данные по пользователю
            $user = $this->updateFromFacebookInfo( $user, $info );
            $user = $em->updateUser( $user );
        } else {
            // создадим нового пользователя
            $user = $em->getUser();
            $user = $this->updateFromFacebookInfo( $user, $info );
            $user->setId($info["id"]);
            $user = $this->updateFromFacebookInfo( $user, $info );
            $user = $em->createUser( $user );
        }
        return $user;
    }

    protected function updateFromFacebookInfo( \Lexicon\Port\Adaptor\Data\Lexicon\User $user, array $info ) {
        $user->setId($info["id"]);
        if(isset($info["email"])) $user->setEmail($info["email"]);
        if(isset($info["first_name"])) $user->setFirstName($info["first_name"]);
        if(isset($info["gender"])) $user->setGender($info["gender"]);
        if(isset($info["last_name"])) $user->setLastName($info["last_name"]);
        if(isset($info["link"])) $user->setLink($info["link"]);
        if(isset($info["locale"])) $user->setLocale($info["locale"]);
        if(isset($info["name"])) $user->setName($info["name"]);
        if(isset($info["timezone"])) $user->setTimezone($info["timezone"]);
        if(isset($info["updated_time"])) $user->setUpdatedTime($info["updated_time"]);
        if(isset($info["verified"])) $user->setVerified(intval($info["verified"]));
        return $user;
    }

}