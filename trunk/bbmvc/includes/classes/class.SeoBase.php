<?php
/* **************************************************************************
 *                            class.SeoBase.php
 *                    ------------------------------------
 *            begin     : Jun 4, 2007
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

class SeoBase{
	
	public function getSeoName($string){
		
		$string = strtolower($string);
		
		$string = ereg_replace("[^[:alnum:] ]"," ",$string);
		$string = preg_replace("/\s\s+/", " ", $string);
		$string = trim($string);
		
		$string = str_replace(" ", "-", $string); 
		
		//return $this->replaceGermanChars($string);  
		return $string;
	}
	
	protected function replaceGermanChars($text){
	
		$text = str_replace("ä", "ae", $text);
		$text = str_replace("Ä", "Ae", $text);
		$text = str_replace("ü", "ue", $text);
		$text = str_replace("Ü", "Ue", $text);
		$text = str_replace("ö", "oe", $text);
		$text = str_replace("Ö", "Oe", $text);
		$text = str_replace("ß", "ss", $text);
		
		return $text;
	}
		
}
 
?>