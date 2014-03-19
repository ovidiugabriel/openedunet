<?php

/* * *************************************************************************
 *                 ovidiu-pc-windowsnt-php-5.4.7-localhost.php
 *                    ------------------------------------
 *            begin     : 04.12.2006
 *            copyright : (C) 2006 Ovidiu Farauanu
 *            email     : ovidiugabriel@gmail.com
 *
 *    $Id: config_ovidiu-windows7.php 6 2011-11-26 00:40:12Z ovidiugabriel@gmail.com $
 *
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

if (!defined('_VALID_ACCESS')) {
    throw new Exception('Access denied!');
}


define('_DEBUG', _DEBUG_BROWSER);
define('_SMARTY_VERSION', '2.6.26');
define('_SMARTY_CACHING', 0);
define('_SMARTY_PAGINATE_VERSION', '1.5');

define('_DEFAULT_MODULE', 'CdCollection');
define('_DEFAULT_ACTION', 'defaultAction');

define('_SECURITY_ENFORCE', 0);
define('_SECURITY_ENFORCE_GET', 1);
define('_SECURITY_ENFORCE_POST', 1);
define('_SECURITY_ENFORCE_COOKIE', 1);

define('_DIR_PROJECT', dirname(__FILE__) . '/..');
define('_DIR_MODULES', _DIR_PROJECT . '/modules');
define('_DIR_LIBRARIES', _DIR_PROJECT . '/includes/libraries');
define('_DIR_TEMPLATES', _DIR_PROJECT . '/templates');
define('_DIR_LANGUAGES', _DIR_PROJECT . '/languages');
define('_DIR_CACHE', _DIR_PROJECT . '/tmp');
define('_DIR_STYLES', _DIR_PROJECT . '/styles');

define ('_ENABLE_MULTILANGUAGE', 0);
define('_LANGUAGE_DEFAULT', 'english');

define('_FILE_MAIN', 'index.php');

define('_URL_MAIN', 'http://localhost/openedunet/bbmvc/');

define('_USE_SEO_LINKS', 0);

define('_DBMS', 'mysqli');
define('_DB_HOST', 'localhost');
define('_DB_USER', 'root');
define('_DB_PASS', '');
define('_DB_NAME', 'cdcol');

// EOF
