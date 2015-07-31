<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       Hyperlink.class.php                                         */
/*                                                                           */
/*  Created on:  31.07.2015 at 07:44:19                                      */
/*  Email:       ovidiugabriel@gmail.com                                     */
/*  Copyright:   (C) 2015 ICE Control srl. All Rights Reserved.              */
/*                                                                           */
/*  $Id$                                                                     */
/*                                                                           */
/* ************************************************************************* */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/*                                                                           */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/**
 *
 * @package html
 */

/**
 * Creates a new Hyperlink object. When this object is converted automatically
 * into a string the result is a HTML link tag.
 *
 * Example:
 *  <pre>
 *      echo hyperlink('http://www.openedunet.org/', 'Project Homepage');
 *      // The output is:
 *      // &lt;a href="http://www.openedunet.org/"&gt;Project Homepage&lt;/a&gt;
 *  </pre>
 *
 * @param string $href
 * @param string $text
 * @return Hyperlink
 */
function html_hyperlink($href, $text) {
    return new html_Hyperlink($href, $text);
}

class html_Hyperlink {
    public function __construct($href, $text) {
        $this->href = $href;
        $this->text = $text;
    }

    public function __toString() {
        return '<a href="'.$this->href.'">'.$this->text.'</a>';
    }
}
