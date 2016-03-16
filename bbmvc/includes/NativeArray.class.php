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
 * Copyright (c) 2015, ICE Control srl
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
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/* 10.10.2015           Added  count(), size(), isEmpty()                    */
/* 04.09.2015           Added NativeArray::toAssoc()                         */
/* 30.07.2015           Added primitive type handling                        */
/* 27.06.2015           Removed NativeArray::fromAnonymousStruct()           */
/*                      Added fromHaxeType()                                 */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/**
 * @package barebone
 */
class NativeArray {
    private $queue = array();

    /**
     * Converts Haxe types to PHP native object with ArrayAccess interface.
     *
     * @param mixed $value
     * @return ArrayAccess
     * @see http://api.haxe.org/php/Lib.html
     *
     */
    static public function fromHaxeType($value) {
        $type = is_object($value) ? get_class($value) : gettype($value);

        switch ($type) {
            case '_hx_anonymous': return new ArrayObject($value);

            // Particular case for StringMap is that member h is needed.
            case 'haxe_ds_StringMap': return new ArrayObject($value->h);
        }
        // No transformation needed, return the original value.
        return $value;
    }

    /**
     * Turns a non-associative array into an associative array.
     * (if it has an even number of segments.)
     *
     * @param array $input
     * @return array
     * @proto static public toAssoc(input:Dynamic):Dynamic
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

    // -------------------------------------------------------------

    /**
     * @param ArrayAccess $in
     * @return void
     */
    private function enqueueConvert(/* Traversable */ &$in) {
        if (is_array($in) || is_object($in)) {
            foreach ($in as &$item) {
                $this->queue[] = &$item;
                $this->enqueueConvert($item);
            }
        }
    }

    /**
     * @param object $in
     * @return void
     */
    private function convertObjectToArray(&$in) {
        $this->queue[] = &$in;
        $this->enqueueConvert($in);

        foreach ($this->queue as &$item) {
            if (is_object($item)) {
                $item = (array) $item;
            }
        }
    }

    /**
     * @param object $object
     * @return array
     */
    static public function fromObject($object) {
        $nativeArray = new NativeArray();
        // copy on write, $object is passed as reference
        $nativeArray->convertObjectToArray($object);
        return (array) $object;
    }

    /**
     * @param array $input
     * @return object
     */
    static public function toObject($input) {

    }

    /**
     * For the original count() function, if the parameter is not an array or
     * not an object with implemented Countable interface, 1 will be returned.
     * There is one exception, if array_or_countable is NULL, 0 will be returned.
     *
     * We find this unfortunate inconsistent. To avoid this behavior, NativeArray::count()
     * accepts only array argument. You can use is_array() and is_object() to check
     * if the value is not an array or an object. If the object is Countable you
     * can simply call the Countable::count() method on the object or just cast the object
     * to array in the call.
     *
     * This function cannot be used with Haxe array types as parameter.
     * Please use NativeArray::size() for this purpose.
     *
     * <code>
     *      $n = (int) NativeArray::count((array) $object);
     * </code>
     *
     * @param array $array
     * @return integer
     */
    static public function count(array $array) {
        return (int) count((array) $array);
    }

    /**
     * Returns the number of elements.
     *
     * This function can be used with Haxe array types as parameter.
     *
     * @param array $value
     * @return integer
     * @proto static public size(value:Dynamic):Int
     */
    static public function size($value) {
        return (int) NativeArray::count( self::fromHaxeType($value) );
    }

    /**
     * For the original empty() function, if the input was undefined variable,
     * null or empty string, the function returned true. Which of course is not correct.
     * To solve this issuse NativeArray::isEmpty() throws an exception if the parameter is not
     * and array, so NativeArray::isEmpty() is used in the following way:
     *
     * <code>
     *      $input_is_empty = NativeArray::isEmpty($input);
     *      // is equivalent with:
     *      $input_is_empty = (0 === NativeArray::count($input));
     * </code>
     *
     * You can use isset() to check if a variable is undefined (aka not set).
     * Of course  isset() returns false when the variabile is null and is_null() returns
     * true when the variabile is not set. But we can use the fact that is_null() throws
     * when the variabile is undefined, while isset() do not throws.
     *
     * @param array $input
     * @return boolean
     * @proto static public isEmpty(input:Dynamic):Bool
     */
    static public function isEmpty($input) {
        return (bool) empty((array) self::fromHaxeType($input));
    }

    //
    // TOPOLOGICAL TRANSFORMATIONS
    //
}

// EOF
