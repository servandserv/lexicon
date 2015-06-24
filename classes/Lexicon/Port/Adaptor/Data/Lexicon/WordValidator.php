<?php

	namespace Lexicon\Port\Adaptor\Data\Lexicon;
	
	/**
	 *
	 * Валидатор класса Lexicon\Port\Adaptor\Data\Lexicon\Word
	 *
	 */
	class WordValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Lexicon\Port\Adaptor\Data\Lexicon\Word $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			$this->addSimpleValidator( 'Autoid', new \Lexicon\Port\Adaptor\Data\Lexicon\Word\AutoidValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getAutoid() ), $handler ) );
			$this->addSimpleValidator( 'Word', new \Lexicon\Port\Adaptor\Data\Lexicon\Word\WordValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getWord() ), $handler ) );
			$this->addSimpleValidator( 'Trans', new \Lexicon\Port\Adaptor\Data\Lexicon\Word\TransValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getTrans() ), $handler ) );
			$this->addSimpleValidator( 'Desc', new \Lexicon\Port\Adaptor\Data\Lexicon\Word\DescValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getDesc() ), $handler ) );
			$this->addSimpleValidator( 'Lastmod', new \Lexicon\Port\Adaptor\Data\Lexicon\Word\LastmodValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getLastmod() ), $handler ) );
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Autoid','1' );
			$this->assertMaxOccurs( 'Autoid','1' );
			$this->assertMinOccurs( 'Word','1' );
			$this->assertMaxOccurs( 'Word','1' );
			$this->assertMinOccurs( 'Trans','1' );
			$this->assertMaxOccurs( 'Trans','1' );
			$this->assertMinOccurs( 'Desc','1' );
			$this->assertMaxOccurs( 'Desc','1' );
			$this->assertMinOccurs( 'Lastmod','0' );
			$this->assertMaxOccurs( 'Lastmod','1' );
		}
	}
	

