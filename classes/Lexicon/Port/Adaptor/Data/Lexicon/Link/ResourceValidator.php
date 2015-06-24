<?php

	namespace Lexicon\Port\Adaptor\Data\Lexicon\Link;
	
	/**
	 *
	 * Валидатор класса Lexicon\Port\Adaptor\Data\Lexicon\Link\Resource
	 *
	 */
	class ResourceValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyTypeValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\AnyType $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

