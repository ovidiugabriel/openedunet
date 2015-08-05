<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       NativeArray.class.php                                       */
/*                                                                           */
/*  Created on:  27.06.2015 at 12:20:59                                      */
/*  Email:       ovidiugabriel@gmail.com                                     */
/*  Copyright:   (C) 2015 ICE Control srl. All Rights Reserved.              */
/*                                                                           */
/*  $Id$                                                                     */
/*                                                                           */
/* ************************************************************************* */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* 30.07.2015           Added primitive type handling                        */
/* 27.06.2015           Removed NativeArray::fromAnonymousStruct()           */
/*                      Added fromHaxeType()                                 */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/*                                                                           */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/**
 * @package barebone
 */
class NativeArray {
    /**
     * Converts Haxe types to PHP native ArrayObject.
     *
     * @param mixed $var
     * @return array
     */
    static public function fromHaxeType($var) {
        $type = is_object($var) ? get_class($var) : gettype($var);

        switch ($type) {
            case '_hx_anonymous':
                $var = new ArrayObject($var);
            break;

            case 'haxe_ds_StringMap':
                // Particular case for StringMap is that member h is needed.
                $var = new ArrayObject($var->h);
            break;

            default:
                # code...
            break;
        }
        return $var;
    }
    
    //
    // TOPOLOGICAL TRANSFORMATIONS
    //
}

// EOF
