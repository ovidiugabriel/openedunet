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
            // Reference: http://en.wikipedia.org/wiki/Web_colors
            $color_map = array(
                'black'            => self::BLACK   ,
                '#000000'          => self::BLACK   ,
                'rgb(0,0,0)'       => self::BLACK   ,
                // ----------------------------------
                'blue'             => self::BLUE    ,
                '#0000FF'          => self::BLUE    ,
                'rgb(0,0,255)'     => self::BLUE    ,
                // ----------------------------------
                'cyan'             => self::CYAN    ,
                '#00FFFF'          => self::CYAN    ,
                'rgb(0,255,255)'   => self::CYAN    ,
                // ----------------------------------
                'green'            => self::GREEN   ,
                '#008000'          => self::GREEN   ,
                'rgb(0,128,0)'     => self::GREEN   ,
                // ----------------------------------
                'magenta'          => self::MAGENTA ,
                '#FF00FF'          => self::MAGENTA ,
                'rgb(255,0,255)'   => self::MAGENTA ,
                // ----------------------------------
                'red'              => self::RED     ,
                '#FF0000'          => self::RED     ,
                'rgb(255,0,0)'     => self::RED     ,
                // ----------------------------------
                'white'            => self::WHITE   ,
                '#FFFFFF'          => self::WHITE   ,
                'rgb(255,255,255)' => self::WHITE   ,
                // ----------------------------------
                'yellow'           => self::YELLOW  ,
                '#FFFF00'          => self::YELLOW  ,
                'rgb(255,255,0)'   => self::YELLOW  ,
            );
            $css_color = str_replace(' ', '',  strtolower($css['color']) );
            if (isset( $color_map[$css_color] )) {
                $text .= $color_map[$css_color];    
            }
        }
        
        if (isset($css['background-color'])) {
            $bgcolor_map = array(
                'black'            => self::BLACK_B   ,
                '#000000'          => self::BLACK_B   ,
                'rgb(0,0,0)'       => self::BLACK_B   ,
                // ----------------------------------
                'blue'             => self::BLUE_B    ,
                '#0000FF'          => self::BLUE_B    ,
                'rgb(0,0,255)'     => self::BLUE_B    ,
                // ----------------------------------
                'cyan'             => self::CYAN_B    ,
                '#00FFFF'          => self::CYAN_B    ,
                'rgb(0,255,255)'   => self::CYAN_B    ,
                // ----------------------------------
                'green'            => self::GREEN_B   ,
                '#008000'          => self::GREEN_B   ,
                'rgb(0,128,0)'     => self::GREEN_B   ,
                // ----------------------------------
                'magenta'          => self::MAGENTA_B ,
                '#FF00FF'          => self::MAGENTA_B ,
                'rgb(255,0,255)'   => self::MAGENTA_B ,
                // ----------------------------------
                'red'              => self::RED_B     ,
                '#FF0000'          => self::RED_B     ,
                'rgb(255,0,0)'     => self::RED_B     ,
                // ----------------------------------
                'white'            => self::WHITE_B   ,
                '#FFFFFF'          => self::WHITE_B   ,
                'rgb(255,255,255)' => self::WHITE_B   ,
                // ----------------------------------
                'yellow'           => self::YELLOW_B  ,
                '#FFFF00'          => self::YELLOW_B  ,
                'rgb(255,255,0)'   => self::YELLOW_B  ,
            );
            
            $css_background = str_replace(' ', '', strtolower($css['background-color']) );
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
