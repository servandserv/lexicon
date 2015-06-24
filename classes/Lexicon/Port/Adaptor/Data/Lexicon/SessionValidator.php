<?php

	namespace Lexicon\Port\Adaptor\Data\Lexicon;
	
	/**
	 *
	 * Валидатор класса Lexicon\Port\Adaptor\Data\Lexicon\Session
	 *
	 */
	class SessionValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Lexicon\Port\Adaptor\Data\Lexicon\Session $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			$this->addSimpleValidator( 'UserId', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\UserIdValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getUserId() ), $handler ) );
			$this->addSimpleValidator( 'Code', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\CodeValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getCode() ), $handler ) );
			$this->addSimpleValidator( 'DtStart', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\DtStartValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getDtStart() ), $handler ) );
			$this->addSimpleValidator( 'Used', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\UsedValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getUsed() ), $handler ) );
			$this->addSimpleValidator( 'NextRule', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\NextRuleValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getNextRule() ), $handler ) );
			$this->addSimpleValidator( 'RepeatRule', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\RepeatRuleValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getRepeatRule() ), $handler ) );
			$this->addSimpleValidator( 'RepeatCounter', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\RepeatCounterValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getRepeatCounter() ), $handler ) );
			$this->addSimpleValidator( 'Attempts', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\AttemptsValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getAttempts() ), $handler ) );
			$this->addSimpleValidator( 'Lastmod', new \Lexicon\Port\Adaptor\Data\Lexicon\Session\LastmodValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getLastmod() ), $handler ) );
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'UserId','0' );
			$this->assertMaxOccurs( 'UserId','1' );
			$this->assertMinOccurs( 'Code','0' );
			$this->assertMaxOccurs( 'Code','1' );
			$this->assertMinOccurs( 'DtStart','0' );
			$this->assertMaxOccurs( 'DtStart','1' );
			$this->assertMinOccurs( 'Used','0' );
			$this->assertMaxOccurs( 'Used','1' );
			$this->assertMinOccurs( 'NextRule','0' );
			$this->assertMaxOccurs( 'NextRule','1' );
			$this->assertMinOccurs( 'RepeatRule','0' );
			$this->assertMaxOccurs( 'RepeatRule','1' );
			$this->assertMinOccurs( 'RepeatCounter','0' );
			$this->assertMaxOccurs( 'RepeatCounter','1' );
			$this->assertMinOccurs( 'Attempts','0' );
			$this->assertMaxOccurs( 'Attempts','1' );
			$this->assertMinOccurs( 'Lastmod','0' );
			$this->assertMaxOccurs( 'Lastmod','1' );
			$this->assertMinOccurs( 'Last','0' );
			$this->assertMaxOccurs( 'Last','unbounded' );
		}
	}
	

