<?php
/* **************************************************************************
 *                            class.CdCollectionSecurity.php
 *                    ------------------------------------
 *            begin     : May 27, 2007
 *            copyright : (C) Brehar Mihai-Tudor
 *            email     : mihai@secure-hosting.ro
 *
 *    $Id$
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

class CdCollectionSecurity extends Security{
	
	public function check_GET_cd_id($string){
		
		if (!parent::isNatural($string)){
			throw new Exception("wrong param _GET[cd_id]");
		}
	}
	
	public function check_POST_cd_id($string){
		if (!parent::isNatural($string)){
			throw new Exception("wrong param _POST[cd_id]");
		}
	}
	
	public function check_POST_cd($array){
		
	}
	
	public function check_POST_cd_title($string){
		/*
		if (!eregi("^[a-z0-9\ \-]*$", $string)){
			throw new Exception("wrong param _POST[cd_title]");
		}
		*/
	}
	
	public function check_POST_cd_artist($string){
		if (!eregi("^[a-z0-9\ \-]*$", $string)){
			throw new Exception("wrong param _POST[cd_artist]");
		}		
	}
	
	public function check_POST_cd_year($string){
		if (!parent::isNatural($string)){
			throw new Exception("wrong param _POST[cd_year]");
		}		
	}

	public function check_GET_status($string){
		
		if (!parent::isNatural($string)){
			throw new Exception("wrong param _GET[status]");
		}
	}

	public function check_GET_error($string){
		
		if (!parent::isNatural($string)){
			throw new Exception("wrong param _GET[error]");
		}
	}

} 

?>