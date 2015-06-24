<?php
set_include_path( dirname(dirname(__FILE__))."/classes".
    PATH_SEPARATOR.dirname(dirname(dirname(__FILE__)))."/vendor/happymeal/classes".
	PATH_SEPARATOR.dirname(dirname(dirname(__FILE__)))."/vendor/happymeal/classes/Adaptor" );
require_once dirname(dirname(dirname(__FILE__))).'/vendor/autoload.php';
spl_autoload_register(
	function ( $class ) {
		$filename = str_replace( array( '\\', '_' ), array( '/', '/' ), $class ).'.php';
		include_once( $filename );
	}
);

session_set_cookie_params( "0", dirname( $_SERVER["SCRIPT_NAME"] ) );
session_name( "PHPSESSID".sha1( dirname( $_SERVER["SCRIPT_NAME"] ) ) );
session_start();