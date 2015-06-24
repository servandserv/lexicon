<?php

	namespace Lexicon\Port\Adaptor\Data\Lexicon;
	
	/**
	 *
	 * Валидатор класса Lexicon\Port\Adaptor\Data\Lexicon\Link
	 *
	 */
	class LinkValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Lexicon\Port\Adaptor\Data\Lexicon\Link $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			$this->addSimpleValidator( 'Resource', new \Lexicon\Port\Adaptor\Data\Lexicon\Link\ResourceValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\AnyType( $tdo->getResource() ), $handler ) );
			$this->addSimpleValidator( 'Rel', new \Lexicon\Port\Adaptor\Data\Lexicon\Link\RelValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getRel() ), $handler ) );
			$this->addSimpleValidator( 'Href', new \Lexicon\Port\Adaptor\Data\Lexicon\Link\HrefValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getHref() ), $handler ) );
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Resource','0' );
			$this->assertMaxOccurs( 'Resource','1' );
			$this->assertMinOccurs( 'Rel','0' );
			$this->assertMaxOccurs( 'Rel','1' );
			$this->assertMinOccurs( 'Href','0' );
			$this->assertMaxOccurs( 'Href','1' );
		}
	}
	

