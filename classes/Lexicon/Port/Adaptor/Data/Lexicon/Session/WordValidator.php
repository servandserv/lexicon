<?php

	namespace Lexicon\Port\Adaptor\Data\Lexicon\Session;
	
	/**
	 *
	 * Валидатор класса Lexicon\Port\Adaptor\Data\Lexicon\Session\Word
	 *
	 */
	class WordValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			$this->addSimpleValidator( 'Id', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word\IdValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getId() ), $handler ) );
			$this->addSimpleValidator( 'UserId', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word\UserIdValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getUserId() ), $handler ) );
			$this->addSimpleValidator( 'Code', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word\CodeValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getCode() ), $handler ) );
			$this->addSimpleValidator( 'Word', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word\WordValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getWord() ), $handler ) );
			$this->addSimpleValidator( 'CAttempts', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word\CAttemptsValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getCAttempts() ), $handler ) );
			$this->addSimpleValidator( 'TAttempts', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word\TAttemptsValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getTAttempts() ), $handler ) );
			$this->addSimpleValidator( 'FAttempts', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word\FAttemptsValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getFAttempts() ), $handler ) );
			$this->addSimpleValidator( 'Status', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word\StatusValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getStatus() ), $handler ) );
			$this->addSimpleValidator( 'Lastmod', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word\LastmodValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getLastmod() ), $handler ) );
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Id','1' );
			$this->assertMaxOccurs( 'Id','1' );
			$this->assertMinOccurs( 'UserId','1' );
			$this->assertMaxOccurs( 'UserId','1' );
			$this->assertMinOccurs( 'Code','1' );
			$this->assertMaxOccurs( 'Code','1' );
			$this->assertMinOccurs( 'Word','1' );
			$this->assertMaxOccurs( 'Word','1' );
			$this->assertMinOccurs( 'CAttempts','1' );
			$this->assertMaxOccurs( 'CAttempts','1' );
			$this->assertMinOccurs( 'TAttempts','1' );
			$this->assertMaxOccurs( 'TAttempts','1' );
			$this->assertMinOccurs( 'FAttempts','1' );
			$this->assertMaxOccurs( 'FAttempts','1' );
			$this->assertMinOccurs( 'Status','1' );
			$this->assertMaxOccurs( 'Status','1' );
			$this->assertMinOccurs( 'Lastmod','1' );
			$this->assertMaxOccurs( 'Lastmod','1' );
		}
	}
	

