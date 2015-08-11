<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       safe.php                                                    */
/*                                                                           */
/*  Created on:  11.08.2015 at 08:15:59                                      */
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

if (!function_exists('safe_count')) {
    /**
     * For the original count() function, if the parameter is not an array or 
     * not an object with implemented Countable interface, 1 will be returned. 
     * There is one exception, if array_or_countable is NULL, 0 will be returned.
     * 
     * We find this unfortunate inconsistent. To avoid this behavior, safe_count()
     * accepts only array argument. You can use is_array() and is_object() to check 
     * if the value is not an array or an object. If the object is Countable you 
     * can simply call the Countable::count() method on the object or just cast the object
     * to array in the call.
     * 
     * <code>
     *      safe_count((array) $object)
     * </code>
     * 
     * @param array $array
     * @return integer
     */
    function safe_count(array $array) { 
        return (int) count($array); 
    }
}

if (!function_exists('safe_assert')) {
    /** 
     * For the original assert() function, if the assertion is given as a string 
     * it will be evaluated as PHP code by assert(). To prevent this, the safe_assert()
     * version casts the assertion to be always a boolean value.
     * 
     * @param bool $assertion
     * @param string $description
     * @return void
     */
    function safe_assert($assertion, $description = null) {
        $assertion = (bool) $assertion;
        assert($description);
    }
}
