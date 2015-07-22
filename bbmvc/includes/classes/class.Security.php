<?php

/* * *************************************************************************
 *                               class.SecurityClass.php
 *                    ------------------------------------
 *            begin     : 04.04.2007
 *            copyright : (C) 2007 Ovidiu Farauanu
 *            email     : ovidiugabriel@gmail.com
 *
 *    $Id:class.Security.php 262 2007-06-07 18:38:47Z mihai $
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
 * @package	barebone
 * @version SVN: $Id:class.Security.php 262 2007-06-07 18:38:47Z mihai $
 * @author Ovidiu Farauanu <ovidiugabriel@gmail.com>
 */
if (!defined('_VALID_ACCESS')) {
    throw new Exception('Access denied!');
}

/**
 * @access public
 */
class Security {

    /**
     *
     * @param string $string
     * @return boolean
     */
    protected function isInt($string) {
        if (ereg("^\-{0,1}[0-9]+$", $string)) {
            return true;
        }

        return false;
    }

    /**
     *
     * @param string $string
     * @return boolean
     */
    protected function isNatural($string) {
        if (ereg("^[0-9]+$", $string)) {
            return true;
        }

        return false;
    }

}

// EOF
