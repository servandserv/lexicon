<?php

	namespace Lexicon\Port\Adaptor\Data\Lexicon\Link;
	
	/**
	 *
	 * Валидатор класса Lexicon\Port\Adaptor\Data\Lexicon\Link\Rel
	 *
	 */
	class RelValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\StringValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

