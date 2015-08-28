<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       install.php                                                 */
/*                                                                           */
/*  Created on:  30.07.2015 at 08:38:31                                      */
/*  Email:       ovidiugabriel@gmail.com                                     */
/*  Copyright:   (C) 2015 ICE Control srl. All Rights Reserved.              */
/*                                                                           */
/*  $Id$                                                                     */
/*                                                                           */
/* ************************************************************************* */

/* * *************************************************************************
 *  Copyright (c) 2015 ICE Control srl
 *  All rights reserved.
 *
 *  Redistribution and use in source and binary forms, with or without
 *  modification, are permitted provided that the following conditions are met:
 *      # Redistributions of source code must retain the above copyright
 *        notice, this list of conditions and the following disclaimer.
 *
 *      # Redistributions in binary form must reproduce the above copyright
 *        notice, this list of conditions and the following disclaimer in the
 *        documentation and/or other materials provided with the distribution.
 *
 *      # Neither the name of the <organization> nor the
 *        names of its contributors may be used to endorse or promote products
 *        derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * ************************************************************************* */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/* 31.07.2015           Fixed default profile setup                          */
/* 30.07.2015           Adjusted to fit git repo structure                   */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

/**
 * @internal
 */
define ('TYPE',         0);

/**
 * @internal
 */
define ('DESCRIPTION',  1);

/**
 * @internal
 */
define ('DIR_PROJECT_BBMVC', str_replace('\\', '/', realpath(__DIR__ . '/../../..'))  .'/bbmvc');

/** 
 * @internal 
 */
define ('ARCHIVE_RELEASE_BBMVC', 'bbmvc-0.2.0.zip');

//
// Adds a little description to constants we generate
//
$request_uri_parent = dirname(dirname(dirname($_SERVER['REQUEST_URI'])));
$types_labels = array(
    '_URL_MAIN'                 => array('string', 'Main URL',
        'http://' . $_SERVER['HTTP_HOST'] . $request_uri_parent),
    
    '_FILE_MAIN'                => array('string', 'Main File',
        'index.php'),
    
    '_DIR_PROJECT'              => array('string', 'Project Directory',
        DIR_PROJECT_BBMVC),
    
    '_DIR_MODULES'              => array('string', 'Modules Directory',
        DIR_PROJECT_BBMVC . '/modules'),
    
    '_DIR_LIBRARIES'            => array('string', 'Libraries Directory',
        DIR_PROJECT_BBMVC . '/libraries'),
    
    '_DIR_TEMPLATES'            => array('string', 'Templates Directory',
        DIR_PROJECT_BBMVC . '/templates'),
    
    '_DIR_LANGUAGES'            => array('string', 'Languages Directory',
        DIR_PROJECT_BBMVC . '/languages'),
    
    '_DIR_CACHE'                => array('string', 'Cache Directory',
        DIR_PROJECT_BBMVC . '/cache'),
    
    '_DEBUG'                    => array('enum:_DEBUG_OFF:_DEBUG_BROWSER:_DEBUG_LOG', 'Debug option',
        1 /* _DEBUG_BROWSER */),
    
    '_SMARTY_VERSION'           => array('string', 'Smarty Version',
        '2.6.18'),
    
    '_SMARTY_CACHING'           => array('boolean', 'Smarty Caching',
        0),
    
    '_SECURITY_ENFORCE'         => array('boolean', 'Use Security Engine',
        0),
    
    '_SECURITY_ENFORCE_GET'     => array('boolean', 'Enforce Security on GET',
        0),
    
    '_SECURITY_ENFORCE_POST'    => array('boolean', 'Enforce Security on POST',
        ''),
    
    '_SECURITY_ENFORCE_COOKIE'  => array('boolean', 'Enforce Security on COOKIE',
        ''),
    
    '_DEFAULT_MODULE'           => array('string', 'Default Module',
        'CdCollections'),
    
    '_DEFAULT_ACTION'           => array('string', 'Default Action',
        'index'),
    
    '_LANGUAGE_DEFAULT'         => array('string', 'Default Language',
        'english'),
    
    '_DB_USER'                  => array('string', 'Database User',
        ''),
    
    '_DB_PASS'                  => array('string', 'Database Password',
        ''),
    
    '_DB_HOST'                  => array('string', 'Database Host',
        ''),
    
    '_DB_NAME'                  => array('string', 'Database Name',
        ''),
    
    '_USE_SEO_LINKS'            => array('boolean', 'Use SEO Links Engine',
        ''),
);

/**
 * @internal
 */
function get_cfg_file_path() {
    $file = DIR_PROJECT_BBMVC . '/profile';
    $profile = file_exists($file) ? trim(file_get_contents($file)) : 'default';
    $cfg_file = DIR_PROJECT_BBMVC . "/config/{$profile}.php";
    return array($profile, $cfg_file);
}

/**
 * @internal
 */
function on_files_extracted() {
    $vars = array();

    list($profile, $cfg_file) = get_cfg_file_path();
    $vars['profile'] = $profile;


    if (file_exists($cfg_file)) {
        $contents = file_get_contents ($cfg_file);
    } else {
        $contents  = '';
        $cfg_file = null;
    }
    $matches = array();

    preg_match_all('/define\((.*),(.*)\)/', $contents, $matches);

    /**
     * @internal
     */
    define ('_VALID_ACCESS', 1);
    require_once DIR_PROJECT_BBMVC . '/includes/constdef.php';
    if (null !== $cfg_file) { require_once $cfg_file; }

    $cfg = array();
    foreach ($matches[1] as $m) {
        $m = trim($m, "'\"");

        // TODO: Must use reflection to get the real value of constants
        $cfg[$m] = constant($m);
    }
    $vars['cfg'] = $cfg;
    return $vars;
}

/**
 * @internal
 */
function config_submitted() {
    global $types_labels;

    list ($profile, $filepath) = get_cfg_file_path();

    $fp = fopen($filepath, 'w');

    if (!$fp) { return ; }

    fwrite($fp, "<?php \n\n");
    date_default_timezone_set('Europe/London');
    fwrite($fp, "// Saved by installer at " . date(DATE_ISO8601) . "\n\n");
    foreach ($types_labels as $k => $type) {
        $type = explode(':', $type[0]);

        fwrite($fp, '// ' . $types_labels[$k][DESCRIPTION] . "\n");

        if (isset($_POST[$k])) {
            $v  = $_POST[$k];
        } else {
            // Default values for some types
            if ($type[TYPE] == 'boolean') {
                $v = '0'; // false
            }
        }

        switch ($type[TYPE]) {
            case 'enum':
                fwrite($fp, "define('$k', $v); \n\n");
                break;

            case 'boolean':
                fwrite($fp, "define('$k', (bool) $v); \n\n");
            break;

            case 'string':
                fwrite($fp, "define('$k', '$v'); \n\n");
            break;

            default:
                # code...
            break;
        }
    }

    file_put_contents(DIR_PROJECT_BBMVC . '/profile', $profile);

    fclose($fp);
    return true;
}

/**
 * @internal
 */
function typed_field($name, $value) {
    global $types_labels;

    $type = explode(':', $types_labels[$name][TYPE]);

    switch (array_shift($type)) {
        case 'string':
            return "<input name=\"{$name}\"
                value=\"{$value}\"
                style=\"width: 100%;\"
                size=\"".strlen($value)."\"
                type=\"text\" />";

        case 'enum':
            $str = '<select name="'.$name.'">';
            $v = (defined($name)) ? constant($name) : $value;
            foreach ($type as $t) {
                $t_val = defined($t) ? constant($t) : $value;
                $selected =  ($t_val == $v) ? ' selected="selected"' : '';
                $str .= '<option value="'.constant($t).'"'.$selected.'>'.$t.'</option>';
            }
            $str .= '</select>';
            return $str;
        break;

        case 'boolean':
            $name_val = defined($name) ? constant($name) : $value;
            $checked = $name_val ? 'checked="checked"' : '';
            return '<input name="'. $name .'" type="checkbox" '.$checked.' value="1" />';
        default: die("Invalid type for {$name}");
    }
}

$vars = array();

//
// First extracts all files from the archive
//
if (!file_exists(DIR_PROJECT_BBMVC)) {
    $zip = new ZipArchive();
    $res = $zip->open(ARCHIVE_RELEASE_BBMVC);
    if ($res === TRUE) {
        $zip->extractTo(__DIR__);
        $zip->close();
    }
}

if (!empty($_POST)) {
    if (config_submitted()) {
        config_file_saved();
    }
}

// Extract variables on global space
$vars = on_files_extracted();
extract($vars);


function html_tag($name, $attrs, $cdata = null) {
    $echo = '<'.$name;
    if (is_array($attrs)) {
        foreach ($attrs as $k => $v) {
            $echo .= ' '.$k.'="'.$v.'"';
        }
    } elseif (null === $cdata) {
        $cdata = $attrs;
    }
    $echo .= ('>'.$cdata .'</'.$name.'>');
    return $echo;
}

function css_style(array $attrs = array()) {
    $echo = '';
    foreach ($attrs as $key => $value) {
        $echo .= $key.': '.$value.';';
    }
    return $echo;
}

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// HTML Code Follows
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

function config_file_saved() {
    echo html_tag('div', array(
            'style' =>  css_style(array(
                    'width'             => '650px',
                    'border'            => '1px solid orange',
                    'background-color'  => '#FFFACD',
                    'padding'           => '10px',
                    'margin-bottom'     => '5px',
                )),
        ), 'Configuration file saved.');
}

echo "<style>
    input[type=text] {
        font-family:    monospace;
        font-size:      12px;
        border:         1px solid #CCCCCC;
        padding:        5px;
        background:     ivory;
    }

    td {
        /* font-family: Arial;  */
        height: 26px;
    }
</style>";

echo "<form method=\"post\">";
echo "<table>";

echo html_tag('tr', html_tag('td', 'Profile name:').
    html_tag('td', html_tag('input', array(
        'type'  =>  'text',
        'value' =>  $profile,
))));

if (count($cfg) > 0) {
    foreach ($cfg as $def_name => $def_value) {
        echo html_tag('tr', html_tag('td', $types_labels[$def_name][1]) .
                html_tag('td', typed_field($def_name, $def_value))
            );
    }
} else {
    foreach ($types_labels as $def_name => $def_value ) {
        echo html_tag('tr', html_tag('td', $types_labels[$def_name][1] ) .
               html_tag('td', typed_field($def_name, $def_value[2]) )
            );
    }
}

echo "</table>";

echo html_tag('div', html_tag('input', array(
        'type'  =>  'submit',
        'value' => 'Save Preferences',
    )));

echo "</form>";
