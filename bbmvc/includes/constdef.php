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

/**
 * @param string $def
 * @param mixed $yes
 * @param mixed $no
 * @return mixed
 */
function ifdef($def, $yes, $no, $fn = null) {
    $val = defined($def) ? $yes : $no;
    if (null !== $fn) {
        $val = $fn($val);
    }
    return $val;
}

/** 
 * @param mixed $s1
 * @param mixed $s2
 * @param mixed $eq
 * @param mixed $neq
 */
function ifeqelse($s1, $s2, $eq, $neq, $fn = null) {
    $val = ($s1 == $s2) ? $eq : $neq;
    if (null !== $fn) {
        $val = $fn($val);
    }
    return $val;
}


// EOF
