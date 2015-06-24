<?php
	namespace Lexicon\Port\Adaptor\Data\Lexicon;
		
	class Session extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:battleship:Lexicon:Session";
		const ROOT = "Session";
		const PREF = NULL;
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
		protected $DtStart = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $Used = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $NextRule = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $RepeatRule = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $RepeatCounter = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $Attempts = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Lastmod = null;
		/**
		 * @maxOccurs unbounded 
		 * @var Lexicon\Port\Adaptor\Data\Lexicon\Session\Word[]
		 */
		protected $Word = [];
		/**
		 * @maxOccurs unbounded 
		 * @var \String[]
		 */
		protected $Last = [];
		/**
		 * @maxOccurs unbounded 
		 * @var Lexicon\Port\Adaptor\Data\Lexicon\Link[]
		 */
		protected $Link = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["userId"] = array(
				"prop"=>"UserId",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->UserId
			);
			$this->_properties["code"] = array(
				"prop"=>"Code",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Code
			);
			$this->_properties["dtStart"] = array(
				"prop"=>"DtStart",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DtStart
			);
			$this->_properties["used"] = array(
				"prop"=>"Used",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Used
			);
			$this->_properties["nextRule"] = array(
				"prop"=>"NextRule",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->NextRule
			);
			$this->_properties["repeatRule"] = array(
				"prop"=>"RepeatRule",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->RepeatRule
			);
			$this->_properties["repeatCounter"] = array(
				"prop"=>"RepeatCounter",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->RepeatCounter
			);
			$this->_properties["attempts"] = array(
				"prop"=>"Attempts",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Attempts
			);
			$this->_properties["lastmod"] = array(
				"prop"=>"Lastmod",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Lastmod
			);
			$this->_properties["Word"] = array(
				"prop"=>"Word",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Word
			);
			$this->_properties["last"] = array(
				"prop"=>"Last",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Last
			);
			$this->_properties["Link"] = array(
				"prop"=>"Link",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Link
			);
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
		public function setDtStart (  $val ) {
			$this->DtStart = $val;
			$this->_properties["dtStart"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setUsed (  $val ) {
			$this->Used = $val;
			$this->_properties["used"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setNextRule (  $val ) {
			$this->NextRule = $val;
			$this->_properties["nextRule"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setRepeatRule (  $val ) {
			$this->RepeatRule = $val;
			$this->_properties["repeatRule"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setRepeatCounter (  $val ) {
			$this->RepeatCounter = $val;
			$this->_properties["repeatCounter"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setAttempts (  $val ) {
			$this->Attempts = $val;
			$this->_properties["attempts"]["text"] = $val;
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
		 * @param Lexicon\Port\Adaptor\Data\Lexicon\Session\Word $val
		 */
		public function setWord ( \Lexicon\Port\Adaptor\Data\Lexicon\Session\Word $val ) {
			$this->Word[] = $val;
			$this->_properties["Word"]["text"][] = $val;
			return $this;
		}
		/**
		 * @param Lexicon\Port\Adaptor\Data\Lexicon\Session\Word[]
		 */
		public function setWordArray ( array $vals ) {
			$this->Word = $vals;
			$this->_properties["Word"]["text"] = $vals;
		}
		/**
		 * @param \String $val
		 */
		public function setLast (  $val ) {
			$this->Last[] = $val;
			$this->_properties["last"]["text"][] = $val;
			return $this;
		}
		/**
		 * @param \String[]
		 */
		public function setLastArray ( array $vals ) {
			$this->Last = $vals;
			$this->_properties["last"]["text"] = $vals;
		}
		/**
		 * @param Lexicon\Port\Adaptor\Data\Lexicon\Link $val
		 */
		public function setLink ( \Lexicon\Port\Adaptor\Data\Lexicon\Link $val ) {
			$this->Link[] = $val;
			$this->_properties["Link"]["text"][] = $val;
			return $this;
		}
		/**
		 * @param Lexicon\Port\Adaptor\Data\Lexicon\Link[]
		 */
		public function setLinkArray ( array $vals ) {
			$this->Link = $vals;
			$this->_properties["Link"]["text"] = $vals;
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
		public function getDtStart() {
			return $this->DtStart;
		}
		/**
		 * @return \Integer
		 */
		public function getUsed() {
			return $this->Used;
		}
		/**
		 * @return \Integer
		 */
		public function getNextRule() {
			return $this->NextRule;
		}
		/**
		 * @return \Integer
		 */
		public function getRepeatRule() {
			return $this->RepeatRule;
		}
		/**
		 * @return \Integer
		 */
		public function getRepeatCounter() {
			return $this->RepeatCounter;
		}
		/**
		 * @return \Integer
		 */
		public function getAttempts() {
			return $this->Attempts;
		}
		/**
		 * @return \String
		 */
		public function getLastmod() {
			return $this->Lastmod;
		}
		/**
		 * @return Lexicon\Port\Adaptor\Data\Lexicon\Session\Word | []
		 */
		public function getWord($index = null) {
			if( $index !== null ) {
				$res = isset($this->Word[$index]) ? $this->Word[$index] : null;
			} else {
				$res = $this->Word;
			}
			return $res;
		}
		/**
		 * @return \String | []
		 */
		public function getLast($index = null) {
			if( $index !== null ) {
				$res = isset($this->Last[$index]) ? $this->Last[$index] : null;
			} else {
				$res = $this->Last;
			}
			return $res;
		}
		/**
		 * @return Lexicon\Port\Adaptor\Data\Lexicon\Link | []
		 */
		public function getLink($index = null) {
			if( $index !== null ) {
				$res = isset($this->Link[$index]) ? $this->Link[$index] : null;
			} else {
				$res = $this->Link;
			}
			return $res;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Lexicon\Port\Adaptor\Data\Lexicon\SessionValidator( $this, $handler );
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
			if( ($prop = $this->getUserId()) !== NULL ) {
				$xw->writeElement( 'userId', $prop );
			}
			if( ($prop = $this->getCode()) !== NULL ) {
				$xw->writeElement( 'code', $prop );
			}
			if( ($prop = $this->getDtStart()) !== NULL ) {
				$xw->writeElement( 'dtStart', $prop );
			}
			if( ($prop = $this->getUsed()) !== NULL ) {
				$xw->writeElement( 'used', $prop );
			}
			if( ($prop = $this->getNextRule()) !== NULL ) {
				$xw->writeElement( 'nextRule', $prop );
			}
			if( ($prop = $this->getRepeatRule()) !== NULL ) {
				$xw->writeElement( 'repeatRule', $prop );
			}
			if( ($prop = $this->getRepeatCounter()) !== NULL ) {
				$xw->writeElement( 'repeatCounter', $prop );
			}
			if( ($prop = $this->getAttempts()) !== NULL ) {
				$xw->writeElement( 'attempts', $prop );
			}
			if( ($prop = $this->getLastmod()) !== NULL ) {
				$xw->writeElement( 'lastmod', $prop );
			}
			if( $props = $this->getWord() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getLast() ) {
				foreach( $props as $prop ) {
				$xw->writeElement( 'last', $prop );
				}
			}
			if( $props = $this->getLink() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
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
				case "userId":
					$this->setUserId( $xr->readString() );
					break;
				case "code":
					$this->setCode( $xr->readString() );
					break;
				case "dtStart":
					$this->setDtStart( $xr->readString() );
					break;
				case "used":
					$this->setUsed( $xr->readString() );
					break;
				case "nextRule":
					$this->setNextRule( $xr->readString() );
					break;
				case "repeatRule":
					$this->setRepeatRule( $xr->readString() );
					break;
				case "repeatCounter":
					$this->setRepeatCounter( $xr->readString() );
					break;
				case "attempts":
					$this->setAttempts( $xr->readString() );
					break;
				case "lastmod":
					$this->setLastmod( $xr->readString() );
					break;
				case "Word":
					$Word = \Adaptor_Bindings::create("\\Lexicon\\Port\\Adaptor\\Data\\Lexicon\\Session\\Word");
					$this->setWord( $Word->fromXmlReader( $xr ) );
					break;
				case "last":
					$this->setLast( $xr->readString() );
					break;
				case "Link":
					$Link = \Adaptor_Bindings::create("\\Lexicon\\Port\\Adaptor\\Data\\Lexicon\\Link");
					$this->setLink( $Link->fromXmlReader( $xr ) );
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
			if(isset($props["userId"])) {
				$this->setUserId($props["userId"]);
			}
			if(isset($props["code"])) {
				$this->setCode($props["code"]);
			}
			if(isset($props["dtStart"])) {
				$this->setDtStart($props["dtStart"]);
			}
			if(isset($props["used"])) {
				$this->setUsed($props["used"]);
			}
			if(isset($props["nextRule"])) {
				$this->setNextRule($props["nextRule"]);
			}
			if(isset($props["repeatRule"])) {
				$this->setRepeatRule($props["repeatRule"]);
			}
			if(isset($props["repeatCounter"])) {
				$this->setRepeatCounter($props["repeatCounter"]);
			}
			if(isset($props["attempts"])) {
				$this->setAttempts($props["attempts"]);
			}
			if(isset($props["lastmod"])) {
				$this->setLastmod($props["lastmod"]);
			}
			if(isset($props["Word"])) {
				if( is_array($props["Word"]) ) {
					foreach($props["Word"] as $k=>$v) {
						$Word = \Adaptor_Bindings::create("\\Lexicon\\Port\\Adaptor\\Data\\Lexicon\\Session\\Word");
						$Word->fromJSON($v);
						$this->setWord($Word);
					}
				}
			}
			if(isset($props["last"])) {
				if( is_array($props["last"]) ) {
					$this->setLastArray($props["last"]);
				}
			}
			if(isset($props["Link"])) {
				if( is_array($props["Link"]) ) {
					foreach($props["Link"] as $k=>$v) {
						$Link = \Adaptor_Bindings::create("\\Lexicon\\Port\\Adaptor\\Data\\Lexicon\\Link");
						$Link->fromJSON($v);
						$this->setLink($Link);
					}
				}
			}
		}
		
	}
		

