<?php

/* **************************************************************************
 *                              constdef.php
 *                    ------------------------------------
 *            begin     : May 13, 2007
 *            copyright : (C) Ovidiu Farauanu
 *            email     : ovidiugabriel@gmail.com
 *
 *    $Id: constdef.php,v 1.1 2007/05/13 12:43:30 ovidiugabriel Exp $
 *
 ***************************************************************************/
 
/* **************************************************************************
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
 ***************************************************************************/

if (!defined('_VALID_ACCESS')) { 
    throw new Exception('Access denied!');
}

define ('_DEBUG_OFF', 0);
define ('_DEBUG_BROWSER', 1);
define ('_DEBUG_LOG', 2);

define('_STATUS_INSERT', 1);
define('_STATUS_UPDATE', 2);
define('_STATUS_DELETE', 3);

define('_ERROR_INSERT', 1);
define('_ERROR_UPDATE', 2);
define('_ERROR_DELETE', 3);


$_statusMsg = array(
	_STATUS_INSERT => "The cd was added",
	_STATUS_UPDATE => "The cd was updated",
	_STATUS_DELETE => "The cd was deleted"
);

$_errorMsg = array(
	_ERROR_INSERT => "There was an error adding the cd",
	_ERROR_UPDATE => "There was an error updating the cd",
	_ERROR_DELETE => "There was an error deleting the cd"
);

?>