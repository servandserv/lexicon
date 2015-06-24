<?php
	namespace Lexicon\Port\Adaptor\Data\Lexicon;
		
	class Link extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:ru:battleship:Lexicon:Link";
		const ROOT = "Link";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \AnyType
		 */
		protected $Resource = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Rel = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Href = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["resource"] = array(
				"prop"=>"Resource",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Resource
			);
			$this->_properties["rel"] = array(
				"prop"=>"Rel",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Rel
			);
			$this->_properties["href"] = array(
				"prop"=>"Href",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Href
			);
		}
		/**
		 * @param \AnyType $val
		 */
		public function setResource ( \Happymeal\Port\Adaptor\Data\XML\Schema\AnyType $val ) {
			$this->Resource = $val;
			$this->_properties["resource"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setRel (  $val ) {
			$this->Rel = $val;
			$this->_properties["rel"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setHref (  $val ) {
			$this->Href = $val;
			$this->_properties["href"]["text"] = $val;
			return $this;
		}
		/**
		 * @return \AnyType
		 */
		public function getResource() {
			return $this->Resource;
		}
		/**
		 * @return \String
		 */
		public function getRel() {
			return $this->Rel;
		}
		/**
		 * @return \String
		 */
		public function getHref() {
			return $this->Href;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Lexicon\Port\Adaptor\Data\Lexicon\LinkValidator( $this, $handler );
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
			if( $prop = $this->getRel() ) $xw->writeAttribute( 'rel', $prop );
			if( $prop = $this->getHref() ) $xw->writeAttribute( 'href', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getResource()) !== NULL ) {
        			$xw->startElement( 'resource');
					$prop->toXmlWriter( $xw, NULL, NULL, \Adaptor_XML::CONTENTS );
					$xw->endElement();
			}
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			if( $attr = $xr->getAttribute( 'rel') ) {
			$this->_attributes['rel']['prop'] = 'Rel';
			$this->setRel( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'href') ) {
			$this->_attributes['href']['prop'] = 'Href';
			$this->setHref( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "resource":
					$this->setResource( $xr->readString() );
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
			if(isset($props["resource"])) {
				$this->setResource($props["resource"]);
			}
			if(isset($props["rel"])) {
				$this->setRel($props["rel"]);
			}
			if(isset($props["href"])) {
				$this->setHref($props["href"]);
			}
		}
		
	}
		

