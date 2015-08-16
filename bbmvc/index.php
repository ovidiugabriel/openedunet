<?php

/* * *************************************************************************
 *
 *            copyright : (C) Brehar Mihai-Tudor
 *            email     : mihai@secure-hosting.ro
 *  $Id$
 * ************************************************************************* */

/* * *************************************************************************
 *  Copyright (c) 2006, BMR Soft srl, ICE Control srl
 *  All rights reserved.
 *
 *  Redistribution and use in source and binary forms, with or without
 *  modification, are permitted provided that the following conditions are met:
 *      # Redistributions of source code must retain the above copyright
 *        notice, this list of conditions and the following disclaimer.
 *          
 *      # Redistributions in binary form must reproduce the above copyright
 *        notice, this list of conditions and the following disclaimer in the
 *        documentation and/or other materials provided with the distribution.
 *          
 *      # Neither the name of the <organization> nor the
 *        names of its contributors may be used to endorse or promote products
 *        derived from this software without specific prior written permission.
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
 * ************************************************************************* */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/* 30.07.2015           Placed ClassLoader class intead of class_loader.php  */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/*
 * Count in how much time is generated each page
 * @since Tuesday, June 13, 2006
 */
$benchmark = new Benchmark();
$benchmark->start();

/*
 * Files should not be accessed without entering throught this file.
 */
if (!defined('_VALID_ACCESS')) {
    define('_VALID_ACCESS', 1);
}

require_once __DIR__ . '/includes/constdef.php';

//we have output buffering...
ob_start();
session_start();

try {

    require_once __DIR__ . '/config.php';
    if (_DEBUG == _DEBUG_BROWSER) {
        error_reporting(E_ALL);
    } else {
        error_reporting(0);
    }
    require_once _DIR_PROJECT . '/includes/ClassLoader.class.php';
    require_once _DIR_PROJECT . '/includes/Dispatcher.class.php';
} catch (Exception $exception) {
    if (_DEBUG == _DEBUG_BROWSER) {
        if (isset($_smarty)) {
            $message = $exception->getMessage();
            // using smarty to display the error
            if ("" != $message) {
                $_smarty->assign('error', $exception->getMessage());
            }
            $_smarty->display('error.tpl');
        } else {
            // no smarty
            echo $exception->getMessage();
        }
    } else if (_DEBUG == _DEBUG_LOG) {
        /*
         * real activation of error logging
         * @since index.php,v 1.8 2007/08/03 06:49:42
         */
        ini_set('log_errors', 1);
        ini_set('error_log', 'error_log');

        error_log('ERROR: ' . $exception->getMessage(), 0);
    } else { // _DEBUG_OFF
        // this point should never be reached
        die('Access denied!');
    }
}

ob_end_flush();

// EOF
