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
     * @param array $array
     * @return integer
     */
    function safe_count(array $array) { 
        return (int) count($array); 
    }
}

if (!function_exists('safe_assert')) {
    /** 
     * @param bool $assertion
     * @param string $description
     * @return void
     */
    function safe_assert($assertion, $description = null) {
        $assertion = (bool) $assertion;
        assert($description);
    }
}
