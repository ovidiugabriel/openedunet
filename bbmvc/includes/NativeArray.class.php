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
     * @param mixed $value
     * @return array
     * 
     */
    static public function fromHaxeType($value) {
        $type = is_object($value) ? get_class($value) : gettype($value);

        switch ($type) {
            case '_hx_anonymous':
                return new ArrayObject($value);

            case 'haxe_ds_StringMap':
                // Particular case for StringMap is that member h is needed.
                return new ArrayObject($value->h);
        }
        // No transformation needed, return the original value.
        return $value;
    }

    /** 
     * Turns a non-associative array into an associative array. (if it has an even number of segments.)
     * 
     * @param array $input
     * @return array
     */
    static public function toAssoc($input) {
        // Use this function to get the assoc... from
        $splits = explode('/', $input);
        $n_splits = count($splits);
        $dict = array();
        for ($i = 0; $i < $n_splits; $i+=2) {
            if (isset( $splits[$i+1] )) {
                $dict[$splits[$i]] = $splits[$i+1];
            }
        }
        return $dict;
    }
    
    //
    // TOPOLOGICAL TRANSFORMATIONS
    //
}

// EOF
