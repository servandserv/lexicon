<?php
	namespace Lexicon\Port\Adaptor\Data\Lexicon;
		
	class Word extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:battleship:Lexicon:Word";
		const ROOT = "Word";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Autoid = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Word = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Trans = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Desc = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Lastmod = null;
		/**
		 * @maxOccurs unbounded 
		 * @var Lexicon\Port\Adaptor\Data\Lexicon\Link[]
		 */
		protected $Link = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["autoid"] = array(
				"prop"=>"Autoid",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Autoid
			);
			$this->_properties["word"] = array(
				"prop"=>"Word",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Word
			);
			$this->_properties["trans"] = array(
				"prop"=>"Trans",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Trans
			);
			$this->_properties["desc"] = array(
				"prop"=>"Desc",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Desc
			);
			$this->_properties["lastmod"] = array(
				"prop"=>"Lastmod",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Lastmod
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
		public function setAutoid (  $val ) {
			$this->Autoid = $val;
			$this->_properties["autoid"]["text"] = $val;
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
		 * @param \String $val
		 */
		public function setTrans (  $val ) {
			$this->Trans = $val;
			$this->_properties["trans"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setDesc (  $val ) {
			$this->Desc = $val;
			$this->_properties["desc"]["text"] = $val;
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
		public function getAutoid() {
			return $this->Autoid;
		}
		/**
		 * @return \String
		 */
		public function getWord() {
			return $this->Word;
		}
		/**
		 * @return \String
		 */
		public function getTrans() {
			return $this->Trans;
		}
		/**
		 * @return \String
		 */
		public function getDesc() {
			return $this->Desc;
		}
		/**
		 * @return \String
		 */
		public function getLastmod() {
			return $this->Lastmod;
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
			$validator = new \Lexicon\Port\Adaptor\Data\Lexicon\WordValidator( $this, $handler );
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
			if( ($prop = $this->getAutoid()) !== NULL ) {
				$xw->writeElement( 'autoid', $prop );
			}
			if( ($prop = $this->getWord()) !== NULL ) {
				$xw->writeElement( 'word', $prop );
			}
			if( ($prop = $this->getTrans()) !== NULL ) {
				$xw->writeElement( 'trans', $prop );
			}
			if( ($prop = $this->getDesc()) !== NULL ) {
				$xw->writeElement( 'desc', $prop );
			}
			if( ($prop = $this->getLastmod()) !== NULL ) {
				$xw->writeElement( 'lastmod', $prop );
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
				case "autoid":
					$this->setAutoid( $xr->readString() );
					break;
				case "word":
					$this->setWord( $xr->readString() );
					break;
				case "trans":
					$this->setTrans( $xr->readString() );
					break;
				case "desc":
					$this->setDesc( $xr->readString() );
					break;
				case "lastmod":
					$this->setLastmod( $xr->readString() );
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
			if(isset($props["autoid"])) {
				$this->setAutoid($props["autoid"]);
			}
			if(isset($props["word"])) {
				$this->setWord($props["word"]);
			}
			if(isset($props["trans"])) {
				$this->setTrans($props["trans"]);
			}
			if(isset($props["desc"])) {
				$this->setDesc($props["desc"]);
			}
			if(isset($props["lastmod"])) {
				$this->setLastmod($props["lastmod"]);
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
		

