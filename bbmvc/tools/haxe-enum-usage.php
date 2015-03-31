<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       haxe-enum-usage.php                                         */
/*                                                                           */
/*  Created on:  30.03.2015 at 04:26:02                                      */
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

/*                                                                           */
/* INCLUDE FILES (DEPENDENCIES)                                              */
/*                                                                           */

require_once 'haxe-common.php';

/*                                                                           */
/* USER DEFINED INCLUDES                                                     */
/*                                                                           */

/*                                                                           */
/* USER DEFINED CONSTANTS                                                    */
/*                                                                           */

/*                                                                           */
/* TYPES                                                                     */
/*                                                                           */

/*                                                                           */
/* --- PUBLIC OPERATIONS (GLOBAL FUNCTIONS) ---                              */
/*                                                                           */

/**
 * @param string $used_class
 * @param string $class_name
 * @param string $target_dir
 * @return string
 */
function haxe_enum_to_php_usage($used_class, $class_name, $target_dir) {
    // TODO: Accept a list of classes as used_class
    $impl_data = haxe_class_to_relpath($class_name, false);
    $class_file = str_replace('\\', '/', realpath($target_dir)) . '/lib/' . $impl_data['relpath'];

    $text = file_get_contents($class_file);
    return preg_replace("/{$used_class}::\\$([A-Za-z0-9_]+)/", $used_class . '::$1', $text);
}

if ( !isset($argv[1]) || !isset($argv[2]) || !isset($argv[3]) ) {
    echo "\n";
    echo "Usage: \n\n";
    echo "      {$argv[0]} <target-dir> <class-file> <used-class> \n\n";
    die;
}

echo haxe_enum_to_php_usage($argv[3], $argv[2], $argv[1]);

// EOF
