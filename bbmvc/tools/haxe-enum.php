<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       haxe-enum.php                                               */
/*                                                                           */
/*  Created on:  05.03.2015 at 06:14:24                                      */
/*  Email:       ovidiugabriel@gmail.com                                     */
/*  Copyright:   (C) 2015 ICE Control srl. All Rights Reserved.              */
/*                                                                           */
/*  Purpose:     Transforms all static members of a given class into         */
/*               const members                                               */
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
 * @param string $class_name
 * @param string $target_dir
 * @return string
 * @internal
 */
function haxe_enum_to_php_class($class_name, $target_dir) {
    $impl_data = haxe_class_to_relpath($class_name);

    require  str_replace('\\', '/', realpath($target_dir)) . '/lib/' . $impl_data['relpath'];
    $refl       = new ReflectionClass($impl_data['full_name']);
    $properties = $refl->getProperties();

    $echo = "class $init_name {\n";
    foreach ($properties as $property) {
        if ($property->isStatic()) {
            $echo .= '    const '. $property->name . " = " . $property->getValue() .";\n";
        }
    }
    $echo .= "}\n";

    return $echo;
}

if ( !isset($argv[1]) || !isset($argv[2]) ) {
    echo "\n";
    echo "{$argv[0]} - Transforms all static members of a given class into \n";
    echo "Usage: \n\n";
    echo "      {$argv[0]} <target-dir> <class-name> \n\n";
    echo "Examples: \n\n";
    echo "      php .\haxe-enum.php C:\HaxeToolkit\haxe\index.php play.mvc.http.Status \n";
    echo "\n\n";
    die;
}

echo "<?php \n\n";
echo haxe_enum_to_php_class($argv[2], $argv[1]);
echo "\n/* EOF */\n";

/* EOF */
