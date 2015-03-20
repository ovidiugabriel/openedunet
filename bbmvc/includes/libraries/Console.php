<?php

class Console {
    /// Foreground color for ANSI black
    /// CSS> color: black;
    const BLACK         = "\033[30m";

    /// Background color for ANSI black
    /// CSS> background-color: black;
    const BLACK_B       = "\033[40m";

    /// ANSI blink
    const BLINK         = "\033[5m";

    /// Foreground color for ANSI blue
    /// CSS> color: blue;
    const BLUE          = "\033[34m";

    /// Background color for ANSI blue
    /// CSS> background-color: blue;
    const BLUE_B        = "\033[44m";

    /// ANSI bold
    /// CSS> font-weight: bold;
    const BOLD          = "\033[1m";

    /// Foreground color for ANSI cyan
    /// CSS> color: cyan;
    const CYAN          = "\033[36m";

    /// Background color for ANSI CYAN
    // CSS> background-color: cyan;
    const CYAN_B        = "\033[46m";

    /// Foreground color for ANSI green
    // CSS> color: green;
    const GREEN         = "\033[32m";

    /// Background color for ANSI green
    // CSS> background-color: green;
    const GREEN_B       = "\033[42m";

    /// ANSI invisible
    const INVISIBLE     = "\033[8m";

    /// Foreground color for ANSI magenta
    /// CSS> color: magenta;
    const MAGENTA       = "\033[35m";

    /// Background color for ANSI magenta
    /// CSS> background-color: magenta;
    const MAGENTA_B     = "\033[45m";

    /// Foreground color for ANSI red
    /// CSS> color: red;
    const RED           = "\033[31m";

    /// Background color for ANSI red
    /// CSS> background-color: red;
    const RED_B         = "\033[41m";

    /// Reset ANSI styles
    const RESET         = "\033[0m";

    /// ANSI reversed
    const REVERSED      = "\033[7m";

    /// ANSI underlines
    /// CSS> text-decoration: underline;
    const UNDERLINED    = "\033[4m";

    /// Foreground color for ANSI white
    /// CSS> color: white;
    const WHITE         = "\033[37m";

    /// Background color for ANSI white
    /// CSS> background-color: white;
    const WHITE_B       = "\033[47m";

    /// Foreground color for ANSI yellow
    /// CSS> color: yellow;
    const YELLOW        = "\033[33m";

    /// Background color for ANSI yellow
    /// CSS> background-color: yellow;
    const YELLOW_B      = "\033[43m";
    
    static public function cssProperties($css)
    {
        $text = '';
        if (isset($css['color'])) {
            $color_map = array(
                'black'   => self::BLACK  ,
                'blue'    => self::BLUE   ,
                'cyan'    => self::CYAN   ,
                'green'   => self::GREEN  ,
                'magenta' => self::MAGENTA,
                'red'     => self::RED    ,
                'white'   => self::WHITE  ,
                'yellow'  => self::YELLOW ,
            );
            $css_color = strtolower($css['color']);
            if (isset( $color_map[$css_color] )) {
                $text .= $color_map[$css_color];    
            }
        }
        
        if (isset($css['background-color'])) {
            $bgcolor_map = array(
                'black'   => self::BLACK_B  ,
                'blue'    => self::BLUE_B   ,
                'cyan'    => self::CYAN_B   ,
                'green'   => self::GREEN_B  ,
                'magenta' => self::MAGENTA_B,
                'red'     => self::RED      ,
                'white'   => self::WHITE    ,
                'yellow'  => self::YELLOW   ,
            );
            
            $css_background = strtolower($css['background-color']);
            if (isset( $bgcolor_map[$css_background] )) {
                $text .= $bgcolor_map[$css_background];
            }
        }
        
        // font-weight: bold;
        if ( isset($css['font-weight']) ) {
            $css_font_weight = strtolower($css['font-weight']);
            if ('bold' == $css_font_weight) {
                $text .= self::BOLD;
            }
        }
        
        if ( isset($css['text-decoration']) ) {
            // text-decoration: underline; 
            $css_text_decoration = strtolower($css['text-decoration']);
            if (false !== strpos(/* haystack: */ $css_text_decoration, /* needle: */ 'underline' )) {
                $text .= self::UNDERLINED;
            }
            
            if (false !== strpos(/* haystack: */ $css_text_decoration, /* needle: */ 'blink')) {
                $text .= self::BLINK;
            }
        }
        return $text;
    }
    
    static public function println($text = '')
    {
        echo "$text\n";
    }
    
    static public function bold($text, $color = '')
    {
        echo self::BOLD . $color . $text . self::RESET;
    }
    
    static public function underline($text, $color = '')
    {
        echo self::UNDERLINED . $color . $text . self::RESET;
    }
}
