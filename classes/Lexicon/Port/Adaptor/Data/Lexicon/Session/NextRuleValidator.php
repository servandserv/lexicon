<?php

	namespace Lexicon\Port\Adaptor\Data\Lexicon\Session;
	
	/**
	 *
	 * Валидатор класса Lexicon\Port\Adaptor\Data\Lexicon\Session\NextRule
	 *
	 */
	class NextRuleValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\IntegerValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\Integer $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

