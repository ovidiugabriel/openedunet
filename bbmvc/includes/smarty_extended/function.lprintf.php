<?php

/* * *************************************************************************
 *                              function.lprintf.php
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

/**
 *
 * @global type $_lang
 * @param type $params
 * @param type $smarty
 * @return type
 * @internal
 */
function smarty_function_lprintf($params, &$smarty) {
    global $_lang;

    $format = $params["string"];

    if (array_key_exists($format, $_lang)) {
        $format = $_lang[$format];
    }

    unset($params["string"]);

    return vsprintf($format, $params);
}

// EOF
