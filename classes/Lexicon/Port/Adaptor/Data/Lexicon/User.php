<?php
	namespace Lexicon\Port\Adaptor\Data\Lexicon;
		
	class User extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:battleship:Lexicon:User";
		const ROOT = "User";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Id = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $FirstName = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Email = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Gender = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $LastName = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Link = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Locale = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Name = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Timezone = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $UpdatedTime = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Verified = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["id"] = array(
				"prop"=>"Id",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Id
			);
			$this->_properties["firstName"] = array(
				"prop"=>"FirstName",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->FirstName
			);
			$this->_properties["email"] = array(
				"prop"=>"Email",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Email
			);
			$this->_properties["gender"] = array(
				"prop"=>"Gender",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Gender
			);
			$this->_properties["lastName"] = array(
				"prop"=>"LastName",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->LastName
			);
			$this->_properties["link"] = array(
				"prop"=>"Link",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Link
			);
			$this->_properties["locale"] = array(
				"prop"=>"Locale",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Locale
			);
			$this->_properties["name"] = array(
				"prop"=>"Name",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Name
			);
			$this->_properties["timezone"] = array(
				"prop"=>"Timezone",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Timezone
			);
			$this->_properties["updatedTime"] = array(
				"prop"=>"UpdatedTime",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->UpdatedTime
			);
			$this->_properties["verified"] = array(
				"prop"=>"Verified",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Verified
			);
		}
		/**
		 * @param \String $val
		 */
		public function setId (  $val ) {
			$this->Id = $val;
			$this->_properties["id"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setFirstName (  $val ) {
			$this->FirstName = $val;
			$this->_properties["firstName"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setEmail (  $val ) {
			$this->Email = $val;
			$this->_properties["email"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setGender (  $val ) {
			$this->Gender = $val;
			$this->_properties["gender"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setLastName (  $val ) {
			$this->LastName = $val;
			$this->_properties["lastName"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setLink (  $val ) {
			$this->Link = $val;
			$this->_properties["link"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setLocale (  $val ) {
			$this->Locale = $val;
			$this->_properties["locale"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setName (  $val ) {
			$this->Name = $val;
			$this->_properties["name"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setTimezone (  $val ) {
			$this->Timezone = $val;
			$this->_properties["timezone"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setUpdatedTime (  $val ) {
			$this->UpdatedTime = $val;
			$this->_properties["updatedTime"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setVerified (  $val ) {
			$this->Verified = $val;
			$this->_properties["verified"]["text"] = $val;
			return $this;
		}
		/**
		 * @return \String
		 */
		public function getId() {
			return $this->Id;
		}
		/**
		 * @return \String
		 */
		public function getFirstName() {
			return $this->FirstName;
		}
		/**
		 * @return \String
		 */
		public function getEmail() {
			return $this->Email;
		}
		/**
		 * @return \String
		 */
		public function getGender() {
			return $this->Gender;
		}
		/**
		 * @return \String
		 */
		public function getLastName() {
			return $this->LastName;
		}
		/**
		 * @return \String
		 */
		public function getLink() {
			return $this->Link;
		}
		/**
		 * @return \String
		 */
		public function getLocale() {
			return $this->Locale;
		}
		/**
		 * @return \String
		 */
		public function getName() {
			return $this->Name;
		}
		/**
		 * @return \String
		 */
		public function getTimezone() {
			return $this->Timezone;
		}
		/**
		 * @return \String
		 */
		public function getUpdatedTime() {
			return $this->UpdatedTime;
		}
		/**
		 * @return \String
		 */
		public function getVerified() {
			return $this->Verified;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Lexicon\Port\Adaptor\Data\Lexicon\UserValidator( $this, $handler );
			$validator->validate();
		}
			
		
		public function toXmlStr( $xmlns=self::NS, $xmlname=self::ROOT ) {
			return parent::toXmlStr($xmlns,$xmlname);
		}

		/**
		* Вывод в XMLWriter
		* @codegen true
		* @param XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		* @param int $mode
		*/
		public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \Adaptor_XML::ELEMENT ) {
			if( $mode & \Adaptor_XML::STARTELEMENT ) $xw->startElementNS( NULL, $xmlname, $xmlns );
			$this->attributesToXmlWriter( $xw, $xmlname, $xmlns );
			$this->elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( $mode & \Adaptor_XML::ENDELEMENT ) $xw->endElement();
		}
				
		/**
		* Вывод атрибутов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function attributesToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::attributesToXmlWriter( $xw, $xmlname, $xmlns );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getId()) !== NULL ) {
				$xw->writeElement( 'id', $prop );
			}
			if( ($prop = $this->getFirstName()) !== NULL ) {
				$xw->writeElement( 'firstName', $prop );
			}
			if( ($prop = $this->getEmail()) !== NULL ) {
				$xw->writeElement( 'email', $prop );
			}
			if( ($prop = $this->getGender()) !== NULL ) {
				$xw->writeElement( 'gender', $prop );
			}
			if( ($prop = $this->getLastName()) !== NULL ) {
				$xw->writeElement( 'lastName', $prop );
			}
			if( ($prop = $this->getLink()) !== NULL ) {
				$xw->writeElement( 'link', $prop );
			}
			if( ($prop = $this->getLocale()) !== NULL ) {
				$xw->writeElement( 'locale', $prop );
			}
			if( ($prop = $this->getName()) !== NULL ) {
				$xw->writeElement( 'name', $prop );
			}
			if( ($prop = $this->getTimezone()) !== NULL ) {
				$xw->writeElement( 'timezone', $prop );
			}
			if( ($prop = $this->getUpdatedTime()) !== NULL ) {
				$xw->writeElement( 'updatedTime', $prop );
			}
			if( ($prop = $this->getVerified()) !== NULL ) {
				$xw->writeElement( 'verified', $prop );
			}
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "id":
					$this->setId( $xr->readString() );
					break;
				case "firstName":
					$this->setFirstName( $xr->readString() );
					break;
				case "email":
					$this->setEmail( $xr->readString() );
					break;
				case "gender":
					$this->setGender( $xr->readString() );
					break;
				case "lastName":
					$this->setLastName( $xr->readString() );
					break;
				case "link":
					$this->setLink( $xr->readString() );
					break;
				case "locale":
					$this->setLocale( $xr->readString() );
					break;
				case "name":
					$this->setName( $xr->readString() );
					break;
				case "timezone":
					$this->setTimezone( $xr->readString() );
					break;
				case "updatedTime":
					$this->setUpdatedTime( $xr->readString() );
					break;
				case "verified":
					$this->setVerified( $xr->readString() );
					break;
				default:
					parent::elementsFromXmlReader( $xr );
			}
		}
		/**
		 * Чтение данных JSON объекта, результата работы json_decode,
		 * в объект
		 * @param mixed array | stdObject
		 *
		 */
		public function fromJSON( $arg ) {
			parent::fromJSON( $arg );
			$props = [];
			if( is_array( $arg ) ) {
				$props = $arg;
			} elseif( is_object( $arg ) ) {
				foreach( $arg as $k=>$v ) {
					$props[$k] = $v;
				}
			}
			if(isset($props["id"])) {
				$this->setId($props["id"]);
			}
			if(isset($props["firstName"])) {
				$this->setFirstName($props["firstName"]);
			}
			if(isset($props["email"])) {
				$this->setEmail($props["email"]);
			}
			if(isset($props["gender"])) {
				$this->setGender($props["gender"]);
			}
			if(isset($props["lastName"])) {
				$this->setLastName($props["lastName"]);
			}
			if(isset($props["link"])) {
				$this->setLink($props["link"]);
			}
			if(isset($props["locale"])) {
				$this->setLocale($props["locale"]);
			}
			if(isset($props["name"])) {
				$this->setName($props["name"]);
			}
			if(isset($props["timezone"])) {
				$this->setTimezone($props["timezone"]);
			}
			if(isset($props["updatedTime"])) {
				$this->setUpdatedTime($props["updatedTime"]);
			}
			if(isset($props["verified"])) {
				$this->setVerified($props["verified"]);
			}
		}
		
	}
		

