<?php

function println($text='') {
    return Console::println($text);
}

class Console  {
    /// Foreground color for ANSI black
    const BLACK         = "\033[30m";

    /// Background color for ANSI black
    const BLACK_B       = "\033[40m";

    /// ANSI blink
    const BLINK         = "\033[5m";

    /// Foreground color for ANSI blue
    const BLUE          = "\033[34m";

    /// Background color for ANSI blue
    const BLUE_B        = "\033[44m";

    /// ANSI bold
    const BOLD          = "\033[1m";

    /// Foreground color for ANSI cyan
    const CYAN          = "\033[36m";

    /// Background color for ANSI CYAN
    const CYAN_B        = "\033[46m";

    /// Foreground color for ANSI green
    const GREEN         = "\033[32m";

    /// Background color for ANSI green
    const GREEN_B       = "\033[42m";

    /// ANSI invisible
    const INVISIBLE     = "\033[8m";

    /// Foreground color for ANSI magenta
    const MAGENTA       = "\033[35m";

    /// Background color for ANSI magenta
    const MAGENTA_B     = "\033[45m";

    /// Foreground color for ANSI red
    const RED           = "\033[31m";

    /// Background color for ANSI red
    const RED_B         = "\033[41m";

    /// Reset ANSI styles
    const RESET         = "\033[0m";

    /// ANSI reversed
    const REVERSED      = "\033[7m";

    /// ANSI underlines
    const UNDERLINED    = "\033[4m";

    /// Foreground color for ANSI white
    const WHITE         = "\033[37m";

    /// Background color for ANSI white
    const WHITE_B       = "\033[47m";

    /// Foreground color for ANSI yellow
    const YELLOW        = "\033[33m";

    /// Background color for ANSI yellow
    const YELLOW_B      = "\033[43m";

    /** 
     * @param string $value 
     */
    public static function println($value='')
    {
        echo "$value\n";
    }

    public static function bold($text, $color = '') 
    {
        $bold = `tput bold`;
        $normal = `tput sgr0`;
        return $color . $bold . $text . $normal;
    }

    public static function underline($text, $color = '') 
    {
        $underline=`tput smul`;
        $normal=`tput rmul`;
        return $color.$underline.$text.$normal;
    }
}

// EOF

