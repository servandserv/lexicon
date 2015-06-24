<?php
	namespace Lexicon\Port\Adaptor\Data\Lexicon\Session;
		
	class Word extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:battleship:Lexicon:Session";
		const ROOT = "Word";
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
		protected $UserId = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Code = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Word = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $CAttempts = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $TAttempts = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $FAttempts = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Status = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Lastmod = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["id"] = array(
				"prop"=>"Id",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Id
			);
			$this->_properties["userId"] = array(
				"prop"=>"UserId",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->UserId
			);
			$this->_properties["code"] = array(
				"prop"=>"Code",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Code
			);
			$this->_properties["word"] = array(
				"prop"=>"Word",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Word
			);
			$this->_properties["cAttempts"] = array(
				"prop"=>"CAttempts",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->CAttempts
			);
			$this->_properties["tAttempts"] = array(
				"prop"=>"TAttempts",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->TAttempts
			);
			$this->_properties["fAttempts"] = array(
				"prop"=>"FAttempts",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->FAttempts
			);
			$this->_properties["status"] = array(
				"prop"=>"Status",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Status
			);
			$this->_properties["lastmod"] = array(
				"prop"=>"Lastmod",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Lastmod
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
		public function setUserId (  $val ) {
			$this->UserId = $val;
			$this->_properties["userId"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setCode (  $val ) {
			$this->Code = $val;
			$this->_properties["code"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setWord (  $val ) {
			$this->Word = $val;
			$this->_properties["word"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setCAttempts (  $val ) {
			$this->CAttempts = $val;
			$this->_properties["cAttempts"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setTAttempts (  $val ) {
			$this->TAttempts = $val;
			$this->_properties["tAttempts"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setFAttempts (  $val ) {
			$this->FAttempts = $val;
			$this->_properties["fAttempts"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setStatus (  $val ) {
			$this->Status = $val;
			$this->_properties["status"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setLastmod (  $val ) {
			$this->Lastmod = $val;
			$this->_properties["lastmod"]["text"] = $val;
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
		public function getUserId() {
			return $this->UserId;
		}
		/**
		 * @return \String
		 */
		public function getCode() {
			return $this->Code;
		}
		/**
		 * @return \String
		 */
		public function getWord() {
			return $this->Word;
		}
		/**
		 * @return \Integer
		 */
		public function getCAttempts() {
			return $this->CAttempts;
		}
		/**
		 * @return \Integer
		 */
		public function getTAttempts() {
			return $this->TAttempts;
		}
		/**
		 * @return \Integer
		 */
		public function getFAttempts() {
			return $this->FAttempts;
		}
		/**
		 * @return \String
		 */
		public function getStatus() {
			return $this->Status;
		}
		/**
		 * @return \String
		 */
		public function getLastmod() {
			return $this->Lastmod;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Lexicon\Port\Adaptor\Data\Lexicon\Session\WordValidator( $this, $handler );
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
			if( ($prop = $this->getUserId()) !== NULL ) {
				$xw->writeElement( 'userId', $prop );
			}
			if( ($prop = $this->getCode()) !== NULL ) {
				$xw->writeElement( 'code', $prop );
			}
			if( ($prop = $this->getWord()) !== NULL ) {
				$xw->writeElement( 'word', $prop );
			}
			if( ($prop = $this->getCAttempts()) !== NULL ) {
				$xw->writeElement( 'cAttempts', $prop );
			}
			if( ($prop = $this->getTAttempts()) !== NULL ) {
				$xw->writeElement( 'tAttempts', $prop );
			}
			if( ($prop = $this->getFAttempts()) !== NULL ) {
				$xw->writeElement( 'fAttempts', $prop );
			}
			if( ($prop = $this->getStatus()) !== NULL ) {
				$xw->writeElement( 'status', $prop );
			}
			if( ($prop = $this->getLastmod()) !== NULL ) {
				$xw->writeElement( 'lastmod', $prop );
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
				case "userId":
					$this->setUserId( $xr->readString() );
					break;
				case "code":
					$this->setCode( $xr->readString() );
					break;
				case "word":
					$this->setWord( $xr->readString() );
					break;
				case "cAttempts":
					$this->setCAttempts( $xr->readString() );
					break;
				case "tAttempts":
					$this->setTAttempts( $xr->readString() );
					break;
				case "fAttempts":
					$this->setFAttempts( $xr->readString() );
					break;
				case "status":
					$this->setStatus( $xr->readString() );
					break;
				case "lastmod":
					$this->setLastmod( $xr->readString() );
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
			if(isset($props["userId"])) {
				$this->setUserId($props["userId"]);
			}
			if(isset($props["code"])) {
				$this->setCode($props["code"]);
			}
			if(isset($props["word"])) {
				$this->setWord($props["word"]);
			}
			if(isset($props["cAttempts"])) {
				$this->setCAttempts($props["cAttempts"]);
			}
			if(isset($props["tAttempts"])) {
				$this->setTAttempts($props["tAttempts"]);
			}
			if(isset($props["fAttempts"])) {
				$this->setFAttempts($props["fAttempts"]);
			}
			if(isset($props["status"])) {
				$this->setStatus($props["status"]);
			}
			if(isset($props["lastmod"])) {
				$this->setLastmod($props["lastmod"]);
			}
		}
		
	}
		

