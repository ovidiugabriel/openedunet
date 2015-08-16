<?php

/* * *************************************************************************
 *                              constdef.php
 *                    ------------------------------------
 *            begin     : May 13, 2007
 *            copyright : (C) Ovidiu Farauanu
 *            email     : ovidiugabriel@gmail.com
 *
 *    $Id$
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

define('_DEBUG_OFF', 0);
define('_DEBUG_BROWSER', 1);
define('_DEBUG_LOG', 2);

//
// If _MODULE_KEY and _ACTION_KEY are not defined in the configuration files
// they get a default value from here.
//
if (!defined('_MODULE_KEY')) { define ('_MODULE_KEY', 'module'); }
if (!defined('_ACTION_KEY')) { define ('_ACTION_KEY', 'action'); }

// EOF
