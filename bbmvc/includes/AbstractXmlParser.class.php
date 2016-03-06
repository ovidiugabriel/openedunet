<?php

/* **************************************************************************
 *                            class.AbstractXmlParser.php
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

    public function parseFile($filename) {
        $this->parseString(file_get_contents($filename));
        return $this;
    }

    /**
     * @param string $data
     * @return null
     */
    public function parseString($data) {
        $this->parser = xml_parser_create();
        xml_set_object($this->parser, $this);
        xml_set_element_handler($this->parser, 'startElement', 'endElement');
        xml_set_character_data_handler($this->parser, 'characterData');

        xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false);
        xml_parse($this->parser, $data);
    }

    abstract public function startElement($parser, $tag, array $attr);
    abstract public function endElement($parser, $tag);
    abstract public function characterData($parser, $data);
}

// EOF
