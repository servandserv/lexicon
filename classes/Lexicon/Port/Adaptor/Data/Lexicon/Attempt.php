<?php
	namespace Lexicon\Port\Adaptor\Data\Lexicon;
		
	class Attempt extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:battleship:Lexicon:Attempt";
		const ROOT = "Attempt";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var Lexicon\Port\Adaptor\Data\Lexicon\Word
		 */
		protected $Word = null;
		/**
		 * @maxOccurs 1 
		 * @var Lexicon\Port\Adaptor\Data\Lexicon\Session
		 */
		protected $Session = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Word"] = array(
				"prop"=>"Word",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Word
			);
			$this->_properties["Session"] = array(
				"prop"=>"Session",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Session
			);
		}
		/**
		 * @param Lexicon\Port\Adaptor\Data\Lexicon\Word $val
		 */
		public function setWord ( \Lexicon\Port\Adaptor\Data\Lexicon\Word $val ) {
			$this->Word = $val;
			$this->_properties["Word"]["text"] = $val;
			return $this;
		}
		/**
		 * @param Lexicon\Port\Adaptor\Data\Lexicon\Session $val
		 */
		public function setSession ( \Lexicon\Port\Adaptor\Data\Lexicon\Session $val ) {
			$this->Session = $val;
			$this->_properties["Session"]["text"] = $val;
			return $this;
		}
		/**
		 * @return Lexicon\Port\Adaptor\Data\Lexicon\Word
		 */
		public function getWord() {
			return $this->Word;
		}
		/**
		 * @return Lexicon\Port\Adaptor\Data\Lexicon\Session
		 */
		public function getSession() {
			return $this->Session;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Lexicon\Port\Adaptor\Data\Lexicon\AttemptValidator( $this, $handler );
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
			if( ($prop = $this->getWord()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getSession()) !== NULL ) {
					$prop->toXmlWriter( $xw );
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
				case "Word":
					$Word = \Adaptor_Bindings::create("\\Lexicon\\Port\\Adaptor\\Data\\Lexicon\\Word");
					$this->setWord( $Word->fromXmlReader( $xr ) );
					break;
				case "Session":
					$Session = \Adaptor_Bindings::create("\\Lexicon\\Port\\Adaptor\\Data\\Lexicon\\Session");
					$this->setSession( $Session->fromXmlReader( $xr ) );
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
			if(isset($props["Word"])) {
				$Word = \Adaptor_Bindings::create("\\Lexicon\\Port\\Adaptor\\Data\\Lexicon\\Word");
				$Word->fromJSON($props["Word"]);
				$this->setWord($Word);
			}
			if(isset($props["Session"])) {
				$Session = \Adaptor_Bindings::create("\\Lexicon\\Port\\Adaptor\\Data\\Lexicon\\Session");
				$Session->fromJSON($props["Session"]);
				$this->setSession($Session);
			}
		}
		
	}
		

