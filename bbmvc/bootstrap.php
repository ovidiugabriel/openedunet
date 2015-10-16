<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       bootstrap.php                                               */
/*                                                                           */
/*  Created on:  12.09.2015 at 09:44:33                                      */
/*  Email:       ovidiugabriel@gmail.com                                     */
/*  Copyright:   (C) 2015 ICE Control srl. All Rights Reserved.              */
/*                                                                           */
/*  $Id$                                                                     */
/*                                                                           */
/* ************************************************************************* */

/*
 * Copyright (c) 2015, ICE Control srl.
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
/* 18.09.2015           Added constdef and composer vendor/autoload.php      */
/* 18.09.2015           Added Haxe Boot.class.php                            */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

//
// Previously used as class_loader.php
// but now the class loader itself is a separate class and this is just
// the bootstrapping of the framework.
//

if (!defined('_VALID_ACCESS')) {
    define ('_VALID_ACCESS', 1);
}

/*                                                                           */
/* INCLUDE FILES (DEPENDENCIES)                                              */
/*                                                                           */

require_once __DIR__ . '/includes/constdef.php';
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/ClassLoader.class.php';

if (_DEBUG == _DEBUG_BROWSER) {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

// FIXME: Need to move vendor folder in another location??
if (file_exists($file = __DIR__ . '/../vendor/autoload.php')) {
    require_once $file;
}

// Registers Barebone MVC specific autoloading
ClassLoader::register();

//
// Haxe generates a main index.php file and alongside a folder named
// `lib`. This folder contains some *.class.php files some *.interface.php files
// and a folder called `php` with a file Boot.class.php which basically
// registers the autoload function _hx_autoload() using spl_autoload_register();
//
// IMPORTANT: If HAXE_PHP_LIB is not defined, then the PHP runtime for Haxe does not boot.
// Make sure this is defined in order to use Haxe.
//
if (defined('HAXE_PHP_LIB')) {
    require_once HAXE_PHP_LIB . '/php/Boot.class.php';
}

// EOF
