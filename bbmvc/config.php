<?php

/* * *************************************************************************
 *                            config.php
 *                    ------------------------------------
 *            begin     : Oct 30, 2006
 *            copyright : (C) Ovidiu Farauanu
 *            email     : ovidiugabriel@gmail.com
 *
 *    $Id$
 *
 * ************************************************************************* */

/*
 *
 * Copyright (c) 2006, BMR Soft srl, ICE Control srl
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *    1. Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *    2. Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *    3. Neither the name of the <organization> nor the
 *       names of its contributors may be used to endorse or promote products
 *       derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/* 30.07.2015           Added redirect to installer in missing profile case  */
/* 18.06.2015           Removed support for default profile                  */
/* 28.02.2014           Added support for default profile.                   */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/**
 *
 */
if (!defined('_VALID_ACCESS')) {
    throw new Exception('Access denied!');
}

/*
 * This is intended to provide a simple configuration for a project with
 * multiple developers. Each developer should create a file called "profile"
 * in the root of this project.
 */

$file = __DIR__ . '/profile';
if (!is_file($file)) {
    // Here we do not use exception handling yet. Dispatcher is not fully loaded.
    die ('Configuration file <b>profile</b> is missing');
} else {
    $profile = trim(file_get_contents($file));
}

$file = __DIR__ . '/config/'.$profile.'.php';
if (file_exists($file)) {
    require_once $file;
} else {
    // Configuration profile is missing.
    $installer_path = '/tools/installer/install.php';
    if ( file_exists(__DIR__ . $installer_path )) {
        header ( 'Location: ' . (rtrim($_SERVER['REQUEST_URI'], '/') . $installer_path ));
        die;
    } else {
        // And the installer has been removed.
        die ('Configuration file <b>config/' . $profile . '.php</b> is missing');
    }
}

// EOF
