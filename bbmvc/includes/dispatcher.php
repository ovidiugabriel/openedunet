<?php


/* **************************************************************************
 *                            dispatcher.php
 *                    ------------------------------------
 *            begin     : Oct 30, 2006
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

if (!defined('_VALID_ACCESS')) {
	throw new Exception('Access denied!');
}

/*
 * Smarty setup
 */
$_smarty = new Smarty;
$_smarty->caching 			= 	_SMARTY_CACHING;
$_smarty->template_dir 	= 	_DIR_TEMPLATES;
$_smarty->compile_dir 		= 	_DIR_CACHE;
$_smarty->cache_dir 		= 	_DIR_CACHE;


require _DIR_PROJECT . '/includes/smarty_extended/function.lprintf.php';
require _DIR_PROJECT . '/includes/smarty_extended/function.url.php';
require _DIR_PROJECT . '/includes/smarty_extended/block.a.php';

$_smarty->register_function('lprintf', 'smarty_function_lprintf');
$_smarty->register_function('url', 'smarty_function_url');
$_smarty->register_block('a', 'smarty_block_a');

/*
 * "exporting" some variables into smarty
 */
 
$_smarty->assign("_errorMsg", $_errorMsg);
$_smarty->assign("_statusMsg", $_statusMsg);

if (isset($_GET["status"])){
	$_smarty->assign("status", $_GET["status"]);
} 
if (isset($_GET["error"])){
	$_smarty->assign("error", $_GET["error"]);
} 

/*
 * Now the dispatcher stuff comes
 */

require_once _DIR_PROJECT . '/includes/dispatcher_functions.php';

/*
 * no module, redirecting to default module
 */
if (empty ($_GET['module'])) {
	redirect(array("module" => _DEFAULT_MODULE));	
}

$module = $_GET['module']; // eg. Module_SubModule_SubSubModule

//module security check
if (!@ereg('^[a-zA-Z_0-9]+$', $module)) {
	throw new Exception('Invalid module: Module name contains invalid characters!');
}

//submodules
$_module_path = str_replace('_', '/', $module);
$module_classname = explode('_', $module); // eg. module = Module_SubModule_SubSubModule
$module_classname = $module_classname[count($module_classname) - 1]; // then module_classname = SubSubModule

//module folder check 
if (!is_dir($folder = (_DIR_MODULES . '/' . $_module_path))) {
	throw new Exception('Invalid module: Folder ' . $folder . ' doesn\'t exists!');
}

//module file check
if (!is_file($file = (_DIR_MODULES . '/' . $_module_path . '/class.' . $module_classname . '.php'))) {
	throw new Exception('Invalid module: File ' . $file . ' doesn\'t exists!');
}

require_once _DIR_MODULES . '/' . $_module_path . '/class.' . $module_classname . '.php';

//enabling multilanguage support 
if (is_file($file = (_DIR_LANGUAGES . '/' . $_module_path . '/' . _LANGUAGE_DEFAULT . '.php'))) {
	$_lang = array ();
	require_once $file;
	$_smarty->assign('_lang', $_lang);
} else
	throw new Exception($file);

$class = new ReflectionClass($module_classname); // throws exception if the class is not existing

$_smarty->assign('_module', $module);
$_smarty->assign('_module_path', $_module_path);
$_smarty->assign('_module_classname', $module_classname);


// next we check the action parameter
if (empty ($_GET['action'])) {
	$action = _DEFAULT_ACTION;
} else {
	$action = $_GET['action'];
}

//action security check

if (!@ereg('^[a-zA-Z_]+$', $action)) {
	throw new Exception('Invalid action! Unsuitable characters detected in action name!');
}
//what if is a special function? (eg: __construct, __set, __get)
if (@ereg("^_{2}", $action)){
	throw new Exception('Action is a special function. Access denied!');
}

//action method exists?
$method = $class->getMethod($action);

//method is public?
if (!$method->isPublic()) {
	throw new Exception('Invalid action! Method ' . $module_classname . '.' . $action . '() is not public!');
}

unset ($class);
unset ($method);


//action is ok

//next, we do a security check for all other params
if (_SECURITY_ENFORCE) {
	//check file
	$security_class = $module_classname . 'Security';
	if (!is_file($file = (_DIR_MODULES . '/' . $_module_path . '/class.' . $security_class . '.php'))) {
		throw new Exception('Security class ' . $security_class . ' missing!');
	}
	require_once $file;

	$class = new ReflectionClass($security_class); // throws exception if the class is not existing
	$security = new $security_class ();

	//checking _GET, _POST and _COOKIE variables
	if (_SECURITY_ENFORCE_GET)
		checkVariables($class, $security, '_GET');
	if (_SECURITY_ENFORCE_POST)
		checkVariables($class, $security, '_POST');
	if (_SECURITY_ENFORCE_COOKIE)
		checkVariables($class, $security, '_COOKIE');

	unset ($class); // we don't need this anymore
}

// params are ok. calling the requested action
$obj = new $module_classname;
$obj->$action();

$_smarty->assign('_action', $action);
$_smarty->display('index.tpl');

?>