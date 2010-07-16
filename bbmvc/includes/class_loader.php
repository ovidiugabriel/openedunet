<?php

/* **************************************************************************
 *                            class_loader.php
 *                    ------------------------------------
 *            begin     : Apr 10, 2007
 *            copyright : (C) Brehar Mihai-Tudor
 *            email     : mihai@secure-hosting.ro
 *
 *    $Id: class_loader.php 278 2007-07-19 21:28:01Z mihai $
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

function __autoload($class_name) {
	
	switch ($class_name){
			
		case 'Smarty':
			if (is_file($file = (_DIR_LIBRARIES . '/Smarty-' . _SMARTY_VERSION . '/libs/Smarty.class.php'))) {
	    	    // smarty is bundled in bbmvc package
		    	require_once $file;
			} else {
		    	// smarty is not bundled in bbmvc package, maybe it is bundled in php distro
		    	require_once 'Smarty.class.php';
			}
			return;
    					
    	default:
			require_once _DIR_PROJECT . '/includes/classes/class.' . $class_name . '.php';
    }
}

?>