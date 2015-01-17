<?php

/* * *************************************************************************
 *
 *            copyright : (C) Brehar Mihai-Tudor
 *            email     : mihai@secure-hosting.ro
 *  $Id$
 * ************************************************************************* */

/* * *************************************************************************
 *
 *    This program is Free Software; you can redistribute it and/or
 *    modify it under the terms of the GNU General Public License
 *    as published by the Free Software Foundation; either version 2
 *    of the License, or (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *    GNU General Public License for more details.
 *    You should have received a copy of the GNU General Public License
 *    along with this program; if not, write to the Free Software
 *    Foundation, Inc., 59 Temple Place - Suite 330,
 *    Boston, MA  02111-1307, USA.
 *
 * ************************************************************************* */

/*
 * Cronometrez in cat timp se genereaza fiecare pagina
 * @since Tuesday, June 13, 2006
 */
$start_microtime = microtime(true);

/*
 * Fisierele nu pot fi accesate decat prin intermediul acestuia
 */
if (!defined('_VALID_ACCESS')) {
    define('_VALID_ACCESS', 1);
}

require_once realpath(dirname(__FILE__)) . '/includes/constdef.php';

//we have output buffering...
ob_start();
session_start();

try {

    require_once realpath(dirname(__FILE__)) . '/config.php';
    if (_DEBUG == _DEBUG_BROWSER) {
        error_reporting(E_ALL);
    } else {
        error_reporting(0);
    }
    require_once _DIR_PROJECT . '/includes/class_loader.php';
    require_once _DIR_PROJECT . '/includes/dispatcher.php';
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
         * activez, pe bune, scrierea erorilor in fisier
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