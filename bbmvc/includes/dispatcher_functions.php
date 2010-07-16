<?php

/* **************************************************************************
 *                            dispatcher_functions.php
 *                    ------------------------------------
 *            begin     : Oct 30, 2006
 *            copyright : (C) Brehar Mihai-Tudor
 *            email     : mihai@secure-hosting.ro
 *
 *    $Id: dispatcher_functions.php 270 2007-06-16 20:15:24Z mihai $
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
    throw new Execption('Access denied!');
}

/**
 * @param ReflectionClass
 * @param Security
 * @param string
 */
function checkVariables(ReflectionClass $class, Security $security, $array) {
	//$array should be $_GET, $_POST, $_COOKIE
	global $$array;
	if (empty($$array)) {
		return;
	}
    
	foreach ($$array as $key => $value) {		
		if ($key == 'module' || $key == 'action') {
			//skipping module and action parameters
			continue;
		}
	
		//the security class should have a method called check_GET_variableName (just an example)
		$function_name = 'check' . $array . '_' . $key;
		$method = $class->getMethod($function_name); //if the method does not exist, an exception will be thrown
		
		//finally, calling the function
		$security->$function_name($value);
    }
}

function redirect($params){
		
	$url_params = "";
	foreach($params as $key => $value){
				
		if (is_array($value)){
			//arrays are also possible, in this case, we are "expanding" the array
			foreach($value as $sub_key => $sub_value){
				$url_params .= $key . "[" . $sub_key . "]=" . urlencode($sub_value) . "&";
			}
		}else{	
			$url_params .= $key . "=" . urlencode($value) . "&";
		}
	}
	
	//removing the last ampersend	
	$url_params = substr($url_params, 0, strlen($url_params)-1);
				
	$url = _URL_MAIN . "/" . _FILE_MAIN . "?" . $url_params;
	

	//saving session...	
	session_write_close();
	
	header("Location: $url");	
	die();
} 

function getSeoUrl($params){
	
	if (isset($params["href"])){
		return _URL_MAIN . "/" . $params["href"]; 
	}
	
    if (empty($params["module"])) {    	
        throw new Exception("getSeoUrl - no module");
        return;
    }

	$href = _FILE_MAIN . "?"; //URL to be used if SEO is not enabled.            
	foreach ($params as $key => $value){
		if (substr($key, 0, 4) == "seo_"){ //ignoring seo_* params
			continue;
		}
		$href .= "$key=$value&amp;";
	}
	
	$href = substr($href, 0, strlen($href) - 5);
	//done building $href
	

    if (! _USE_SEO_LINKS){    	
    	return _URL_MAIN . "/" . $href;
    }   
    
	if (empty($params["action"])){
		$params["action"]	= "defaultAction";
	}
              
															
	//calling the seo functions of the module
	$seo_class = $params["module"] . "Seo";
		
	if (is_file(_DIR_MODULES . "/$params[module]/class.$seo_class.php")){ //module file check 		
		include_once(_DIR_MODULES . "/$params[module]/class.$seo_class.php");
		try{
			$class  	= new ReflectionClass($seo_class);	//throws exception if the class is not existing
			$action		= "seo_" . $params["action"];
			$method	= $class->getMethod($action); //check for public method
			if ($method->isPublic()){
				$obj = new $seo_class();
				return _URL_MAIN . "/" . $obj->$action($params);	//calling the seo method
			}
			
		}catch(Exception $e){
			//no seo_class or method not existing
		}
	}
	    		
	return _URL_MAIN . "/" . $href;
	
}

?>