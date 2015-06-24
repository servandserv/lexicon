<?php
	namespace Lexicon\Port\Adaptor\Data\Lexicon\Session;
		
	class Sessions extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:battleship:Lexicon:Session";
		const ROOT = "Sessions";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var Lexicon\Port\Adaptor\Data\Lexicon\Session[]
		 */
		protected $Session = [];
		/**
		 * @maxOccurs unbounded 
		 * @var Lexicon\Port\Adaptor\Data\Lexicon\Link[]
		 */
		protected $Link = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Session"] = array(
				"prop"=>"Session",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Session
			);
			$this->_properties["Link"] = array(
				"prop"=>"Link",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Link
			);
		}
		/**
		 * @param Lexicon\Port\Adaptor\Data\Lexicon\Session $val
		 */
		public function setSession ( \Lexicon\Port\Adaptor\Data\Lexicon\Session $val ) {
			$this->Session[] = $val;
			$this->_properties["Session"]["text"][] = $val;
			return $this;
		}
		/**
		 * @param Lexicon\Port\Adaptor\Data\Lexicon\Session[]
		 */
		public function setSessionArray ( array $vals ) {
			$this->Session = $vals;
			$this->_properties["Session"]["text"] = $vals;
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
		 * @return Lexicon\Port\Adaptor\Data\Lexicon\Session | []
		 */
		public function getSession($index = null) {
			if( $index !== null ) {
				$res = isset($this->Session[$index]) ? $this->Session[$index] : null;
			} else {
				$res = $this->Session;
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
			$validator = new \Lexicon\Port\Adaptor\Data\Lexicon\Session\SessionsValidator( $this, $handler );
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
			if( $props = $this->getSession() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
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
				case "Session":
					$Session = \Adaptor_Bindings::create("\\Lexicon\\Port\\Adaptor\\Data\\Lexicon\\Session");
					$this->setSession( $Session->fromXmlReader( $xr ) );
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
			if(isset($props["Session"])) {
				if( is_array($props["Session"]) ) {
					foreach($props["Session"] as $k=>$v) {
						$Session = \Adaptor_Bindings::create("\\Lexicon\\Port\\Adaptor\\Data\\Lexicon\\Session");
						$Session->fromJSON($v);
						$this->setSession($Session);
					}
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
		

