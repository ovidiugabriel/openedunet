<?php

/* **************************************************************************
 *                            AbstractXmlParser.class.php
 *                    ------------------------------------
 *            begin     : Sep 4, 2008
 *            copyright : (C) 2008 Ovidiu Farauanu
 *            email     : ovidiugabriel@gmail.com
 *
 *    $Id$
 *
 ***************************************************************************/

/**
 * @access public
 */
abstract class AbstractXmlParser {

    /** @var resource */
    protected $parser;

    /**
     *
     * @param  string $filename
     * @return AbstractXmlParser
     * @proto public parseFile(filename:String): AbstractXmlParser
     */
    public function parseFile($filename) {
        $this->parseString(file_get_contents($filename));
        return $this;
    }

    /**
     * @param string $data
     * @return AbstractXmlParser
     * @proto public parseString(data:String): AbstractXmlParser
     */
    public function parseString($data) {
        $this->parser = xml_parser_create();
        xml_set_object($this->parser, $this);
        xml_set_element_handler($this->parser, 'startElement', 'endElement');
        xml_set_character_data_handler($this->parser, 'characterData');

        xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false);
        xml_parse($this->parser, $data);
        return $this;
    }

    /**
     *
     * @param  mixed $parser
     * @param  string $tag
     * @param  array  $attr
     * @return void
     * @proto public startElement(parser:Dynamic, tag:String, attr:Dynamic): Void
     */
    abstract public function startElement($parser, $tag, $attr);

    /**
     *
     * @param  mixed $parser [description]
     * @param  string $tag    [description]
     * @return void
     * @proto public endElement(parser:Dynamic, tag:String): Void
     */
    abstract public function endElement($parser, $tag);

    /**
     *
     * @param  mixed $parser
     * @param  string $data
     * @return void
     * @proto public characterData(parser:Dynamic, data:String): Void
     */
    abstract public function characterData($parser, $data);
}

// EOF
