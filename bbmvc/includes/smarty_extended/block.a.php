<?php

/* * *************************************************************************
 *                            block.a.php
 *                    ------------------------------------
 *            begin     : Jun 4, 2007
 *            copyright : (C) Brehar Mihai-Tudor
 *            email     : mihai@secure-hosting.ro
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

/**
 *
 * @param type $params
 * @param type $content
 * @param type $smarty
 * @param type $repeat
 * @return type
 * @internal
 */
function smarty_block_a($params, $content, &$smarty, &$repeat) {

    // only output on the closing tag
    if (!$repeat) {

        //do we have the 'rel' attribute? Eg: <a href="..." rel="nofollow">...</a>
        $rel = "";
        if (!empty($params["rel"])) {
            $rel = "rel=\"$params[rel]\"";
            unset($params["rel"]);
        }

        //do we have the 'target' attribute? Eg: <a href="..." target="_blank">...</a>
        $target = "";
        if (!empty($params["target"])) {
            $target = "target=\"$params[target]\"";
            unset($params["target"]);
        }

        //if there is a 'href' param, then we stop here returning the 'href' param
        if (!empty($params["href"])) {
            return "<a  $rel $target href=\"" . _URL_MAIN . "/$params[href]\">$content</a>";
        }

        return "<a $rel $target href=\"" . getSeoUrl($params) . "\">$content</a>";
        ;
    }
}

// EOF
