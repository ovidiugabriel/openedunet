<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       MethodReceiver.php                                          */
/*                                                                           */
/*  Created on:  17.08.2015 at 10:55:25                                      */
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

class MethodReceiver {
    /**
     * @param string $func_name
     * @param array $param_arr
     * @return mixed
     * @throws Exception
     */
    public function __call($func_name, array $param_arr) {
        //
        // If we arrive here, we try to make camel case or underscore separated work the same.
        // Strictly speaking camel-case method names are fake in PHP because function names are case insensitive.
        //
        $method_name = str_replace('_', '', $func_name);
        if (method_exists($this, $method_name)) {
            return call_user_func_array(array($this, $method_name), $param_arr);
        }

        throw new Exception('Method ' . __CLASS__ . "::$func_name() does not exists.", 1);
    }
}
