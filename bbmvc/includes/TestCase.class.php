<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       TestCase.php                                                */
/*                                                                           */
/*  Created on:  18.09.2015 at 10:49:01                                      */
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
/* 18.09.2015           Initial commit                                       */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/*                                                                           */
/* INCLUDE FILES (DEPENDENCIES)                                              */
/*                                                                           */

require_once __DIR__ . '/safe.php';

//
// PHPUnit is a huge, broken implementation of a Unit Test framework.
// I was unable to run my unit-tests on Windows because PHPUnit depends on
// PHP_Invoker which is not available on Windows.
//
// So I decided to switch to this simple unit test framework that just work.
// No other fancy shit.
//

class TestCase {
    /**
     * @param string $class_name
     */
    static public function exec($class_name) {
        $instance = new $class_name();
        $methods = get_class_methods($class_name);
        foreach ($methods as $method) {
            if ('test' == substr($method, 0, 4)) {
                call_user_func(array($instance, $method));
            }
        }
    }
    
    /** 
     * @param boolean $assertion
     * @param string $description
     * @return boolean
     */
    public function assert($assertion, $description = null) {
        return safe_assert($assertion, $description);
    }
}

// EOF
