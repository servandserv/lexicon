<?php

	namespace Lexicon\Port\Adaptor\Data\Lexicon;
	
	/**
	 *
	 * Валидатор класса Lexicon\Port\Adaptor\Data\Lexicon\User
	 *
	 */
	class UserValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Lexicon\Port\Adaptor\Data\Lexicon\User $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			$this->addSimpleValidator( 'Id', new \Lexicon\Port\Adaptor\Data\Lexicon\User\IdValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getId() ), $handler ) );
			$this->addSimpleValidator( 'FirstName', new \Lexicon\Port\Adaptor\Data\Lexicon\User\FirstNameValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getFirstName() ), $handler ) );
			$this->addSimpleValidator( 'Email', new \Lexicon\Port\Adaptor\Data\Lexicon\User\EmailValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getEmail() ), $handler ) );
			$this->addSimpleValidator( 'Gender', new \Lexicon\Port\Adaptor\Data\Lexicon\User\GenderValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getGender() ), $handler ) );
			$this->addSimpleValidator( 'LastName', new \Lexicon\Port\Adaptor\Data\Lexicon\User\LastNameValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getLastName() ), $handler ) );
			$this->addSimpleValidator( 'Link', new \Lexicon\Port\Adaptor\Data\Lexicon\User\LinkValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getLink() ), $handler ) );
			$this->addSimpleValidator( 'Locale', new \Lexicon\Port\Adaptor\Data\Lexicon\User\LocaleValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getLocale() ), $handler ) );
			$this->addSimpleValidator( 'Name', new \Lexicon\Port\Adaptor\Data\Lexicon\User\NameValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getName() ), $handler ) );
			$this->addSimpleValidator( 'Timezone', new \Lexicon\Port\Adaptor\Data\Lexicon\User\TimezoneValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getTimezone() ), $handler ) );
			$this->addSimpleValidator( 'UpdatedTime', new \Lexicon\Port\Adaptor\Data\Lexicon\User\UpdatedTimeValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getUpdatedTime() ), $handler ) );
			$this->addSimpleValidator( 'Verified', new \Lexicon\Port\Adaptor\Data\Lexicon\User\VerifiedValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getVerified() ), $handler ) );
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Id','1' );
			$this->assertMaxOccurs( 'Id','1' );
			$this->assertMinOccurs( 'FirstName','0' );
			$this->assertMaxOccurs( 'FirstName','1' );
			$this->assertMinOccurs( 'Email','0' );
			$this->assertMaxOccurs( 'Email','1' );
			$this->assertMinOccurs( 'Gender','0' );
			$this->assertMaxOccurs( 'Gender','1' );
			$this->assertMinOccurs( 'LastName','0' );
			$this->assertMaxOccurs( 'LastName','1' );
			$this->assertMinOccurs( 'Link','0' );
			$this->assertMaxOccurs( 'Link','1' );
			$this->assertMinOccurs( 'Locale','0' );
			$this->assertMaxOccurs( 'Locale','1' );
			$this->assertMinOccurs( 'Name','0' );
			$this->assertMaxOccurs( 'Name','1' );
			$this->assertMinOccurs( 'Timezone','0' );
			$this->assertMaxOccurs( 'Timezone','1' );
			$this->assertMinOccurs( 'UpdatedTime','0' );
			$this->assertMaxOccurs( 'UpdatedTime','1' );
			$this->assertMinOccurs( 'Verified','0' );
			$this->assertMaxOccurs( 'Verified','1' );
		}
	}
	

