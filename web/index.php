<?php

    require_once __DIR__.'/../conf/bootstrap.php';
    require_once __DIR__.'/../conf/conf.php';

    use Facebook\FacebookSession;
    use Facebook\FacebookRequest;
    use Facebook\FacebookRedirectLoginHelper;
    use Facebook\GraphUser;

    
    $lc = \Lexicon\Infrastructure\Helpers\Locator::getInstance();
    FacebookSession::setDefaultApplication($lc->FB_ID, $lc->FB_KEY);
    $helper = new FacebookRedirectLoginHelper('http://www.battleship.ru/lexi/index.php#greeting');
    
    try {
        if ( isset( $_SESSION['access_token'] ) ) {
            // Check if an access token has already been set.
            $session = new FacebookSession( $_SESSION['access_token'] );
        } else {
            // Get access token from the code parameter in the URL.
            $session = $helper->getSessionFromRedirect();
        }
    } catch( FacebookRequestException $ex ) {
        // When Facebook returns an error.
        error_log( $ex->getMessage() );
        throw new Exception( "Facebook returns an error", 550 );
    } catch( \Exception $ex ) {
        // When validation fails or other local issues.
        error_log( $ex->getMessage() );
        throw new Exception( "Facebook validation fails or other local issues", 550 );
    }
    if ( isset( $session ) ) {
        // Retrieve & store the access token in a session.
        $_SESSION['access_token'] = $session->getToken();
        // Retrieve User’s Profile Information
        $request = ( new FacebookRequest( $session, 'GET', '/me' ) )->execute();
        // Get response as an array
        $info = $request->getGraphObject()->asArray();
        // Найти пользователя
        $usecase = new \Lexicon\Application\RegisterUserUseCase();
        $user = $usecase->execute( $info );
        $_SESSION["LEXICON_USER"] = $user->getId();
        // если пользователя в базе не существует, то надо создать его
        // Найти сессии пользователя
        $usecase = new \Lexicon\Application\FindUserSessionsUseCase();
        $sessions = $usecase->execute( $user->getId() );
        $link = new \Lexicon\Port\Adaptor\Data\Lexicon\Link();
        $link->setRel("user");
        $link->setHref("?");
        $link->setResource( $user );
        $sessions->setLink( $link );
        header("Content-Type: text/xml; charset=utf-8");
        $sessions->setPI("stylesheets/Lexicon/Sessions.grid.xsl");
        echo $sessions->toXmlStr();
        exit;
    } else {
        // Generate the login URL for Facebook authentication.
        $permissions = array(
            'email','publish_actions'
        );
        $loginUrl = $helper->getLoginUrl();
        $xmlstr = "<?xml version=\"1.0\" encoding=\"utf-8\"?><?xml-stylesheet type=\"text/xsl\" href=\"stylesheets/Lexicon/Login.grid.xsl\"?><url xmlns=\"urn:ru:battleship:Lexicon\">".htmlspecialchars($loginUrl)."</url>";
        header("Content-Type: text/xml; charset=utf-8");
        echo $xmlstr;
        exit(0);
    }