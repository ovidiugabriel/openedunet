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

/*
 * This is intended to provide a simple configuration for a project with multiple developers. 
 * Each developer should create a file called "profile" in the root of this project.
 * The contents of the file should be used to identify the developer. Eg: john
 * Then, a "config_john.php" file should be created in the config folder.
 */
$file = realpath(dirname(__FILE__)) . '/profile';
if (file_exists($file)) {
    $profile = file_get_contents($file);

    $profile_path = realpath(dirname(__FILE__)) . '/config/config_' . $profile . '.php';
    if (file_exists($profile_path)) {
        require_once $profile_path;
    } else {
        
    }
} else {
    
}

// EOF
