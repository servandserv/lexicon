<?php

	namespace Lexicon\Port\Adaptor\Data\Lexicon\Session;
	
	/**
	 *
	 * Валидатор класса Lexicon\Port\Adaptor\Data\Lexicon\Session\UserId
	 *
	 */
	class UserIdValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\StringValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

