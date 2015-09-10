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

/*
 * Copyright (c) <YEAR>, <OWNER>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice, this 
 * list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice, 
 * this list of conditions and the following disclaimer in the documentation 
 * and/or other materials provided with the distribution.
 *
 * 3. Neither the name of the copyright holder nor the names of its contributors 
 * may be used to endorse or promote products derived from this software without 
 * specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND 
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
 * IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, 
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, 
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF 
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE 
 * OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF 
 * ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

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
