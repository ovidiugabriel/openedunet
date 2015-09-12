<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       m4.php                                                      */
/*                                                                           */
/*  Created on:  12.09.2015 at 10:06:34                                      */
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
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/*                                                                           */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

//
// This function is so common that I expect it to be already defined somewhere
// But if it is not, let's define it here.
//
if (!function_exists('identity')) {
    // No need to specify 'Identity' since php function names are case insensitive
    function identity($x) {
        return $x;
    }
}

/**
 *  When you feel that doing this:
 * 
 *      if (defined('CONSTANT_NAME')) {
 *          $val = 'yes';
 *      } else {
 *          $val = 'no';
 *      }
 * 
 * Has no added value, and you understand that this is nothing but a 
 * basic boolean expression:
 * 
 *      $val = defined('CONSTANT_NAME') ? 'yes' : 'no';
 * 
 * But if for some deceptive reason you want to avoid ternary operator, 
 * (or you are not allowed to use it), then just do it this way:
 * 
 *     $val = ifdef('CONSTANT_NAME', 'yes', 'no');
 * 
 * @param string $def
 * @param mixed $yes value to be returned or function to be called if constant is defined
 * @param mixed $no value to be returned or function to be called if constant is not defined
 * @param callable $fn may be used to ensure the type of the return value
 * @return mixed
 */
function if_defined($def, $yes, $no, $fn = 'identity') {
    if (!is_callable($yes) && !is_callable($no)) {
        return $fn(defined($def) ? $yes : $no);
    }
    
    if (defined($def)) {
        return $yes();
    }
    return $no();
}

/** 
 * @param mixed $s1
 * @param mixed $s2
 * @param mixed $eq value to be returned or function to be called if values are equal
 * @param mixed $neq value to be returned or function to be called if values are not equal
 * @param callabke $fn may be used to ensure the type of the return value
 */
function if_equals_else($s1, $s2, $eq, $neq, $fn = 'identity') {
    if (!is_callable($eq) && !is_callable($neq)) {
        return $fn(($s1 == $s2) ? $eq : $neq);
    }
    
    if ($s1 == $s2) {
        return $eq();
    }
    return $neq();
}
