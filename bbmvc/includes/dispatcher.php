<?php

/* * *************************************************************************
 *                            dispatcher.php
 *                    ------------------------------------
 *            begin     : Oct 30, 2006
 *            copyright : (C) Brehar Mihai-Tudor
 *            email     : mihai@secure-hosting.ro
 *
 *    $Id$
 *
 * ************************************************************************* */

/* * *************************************************************************
 *  Copyright (c) 2006, BMR Soft srl, ICE Control srl
 *  All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice, this
 * list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 * this list of conditions and the following disclaimer in the documentation
 * and/or other materials provided with the distribution.
 *
 * 3. Neither the name of the copyright holder nor the names of its contributors
 * may be used to endorse or promote products derived from this software without
 * specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
 * IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE
 * OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF
 * ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * ************************************************************************* */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/* 25.10.2015           Using Factory::getDispatcher() - get dispatcher inst */
/* 16.10.2015           Fixed security issues, added include paths           */
/* 31.07.2015           Added configurable module and action keys.           */
/* 30.07.2015           Guarded Smarty usage                                 */
/* 28.02.2014           Guarded multilanguage support.                       */
/*                      Removed useless variables.                           */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */


if (!defined('_VALID_ACCESS')) {
    throw new Exception('Access denied!');
}

// TODO: Remove smarty support from here as long as it will be provided by
// the `WebApp extends Controller` class.

if (defined('_USE_SMARTY') && _USE_SMARTY) {
    /*
     * Smarty setup
     */

    $_smarty                = new Smarty();
    $_smarty->caching       = _SMARTY_CACHING;
    $_smarty->template_dir  = _DIR_TEMPLATES;
    $_smarty->compile_dir   = _DIR_CACHE;
    $_smarty->cache_dir     = _DIR_CACHE;

    $smarty_ext_config = require_once _DIR_PROJECT . '/includes/smarty_extended/config.php';
    foreach ($smarty_ext_config as $plugin) {
        require_once _DIR_PROJECT . '/includes/smarty_extended/' . $plugin['type'] . '.' . $plugin['name'] . '.php';
        // @see http://www.smarty.net/docs/en/api.register.plugin.tpl
        $fn_name = 'smarty_' . $plugin['type'] . '_' . $plugin['name'];
        $_smarty->registerPlugin($plugin['type'], $plugin['name'], $fn_name);
        // FIXME: https://github.com/smarty-php/smarty/issues/131
    }
}

// --------------------------------------------------------------------

/*
 * Now the dispatcher stuff comes
 */

$module = filter_input(INPUT_GET, _MODULE_KEY); // eg. Module_SubModule_SubSubModule
/*
 * no module, redirecting to default module
 */
if (null == $module) {
    redirect(array(_MODULE_KEY => _DEFAULT_MODULE));
}

//module security check
if (!@ereg('^[a-zA-Z_0-9]+$', $module)) {
    throw new Exception('Invalid module: Module name contains invalid characters!');
}

//submodules
$_module_path = str_replace('_', '/', $module);
$a_module_classname = explode('_', $module); // eg. module = Module_SubModule_SubSubModule
$module_classname = $a_module_classname[count($a_module_classname) - 1]; // then module_classname = SubSubModule

//module folder check
if (!is_dir($folder = (_DIR_MODULES . '/' . $_module_path))) {
    throw new Exception('Invalid module: Folder ' . $folder . ' doesn\'t exists!');
}

//module file check
if (!is_file($file = (_DIR_MODULES . '/' . $_module_path . '/' . $module_classname . '.class.php'))) {
    throw new Exception('Invalid module: File ' . $file . ' doesn\'t exists!');
}

require_once _DIR_MODULES . '/' . $_module_path . '/' . $module_classname . '.class.php';

if (defined('_ENABLE_MULTILANGUAGE') && _ENABLE_MULTILANGUAGE) {
    //enabling multilanguage support
    if (is_file($file = (_DIR_LANGUAGES . '/' . $_module_path . '/' . _LANGUAGE_DEFAULT . '.php'))) {
        $_lang = array();
        require_once $file;


        // TODO: Remove smarty support from here as long as it will be provided by
        // the `WebApp extends Controller` class.

        // FIXME: Most likely don't have to use this because we have {translate} in smarty.
        // $_smarty->assign('_lang', $_lang);
    } else {
        throw new Exception($file);
    }
}

// TODO: Remove smarty support from here as long as it will be provided by
// the `WebApp extends Controller` class.

if (defined('_USE_SMARTY') && _USE_SMARTY) {
    $_smarty->assign('_module', $module);
    $_smarty->assign('_module_path', $_module_path); // ??
    $_smarty->assign('_module_classname', $module_classname); // ??
}

// next we check the action parameter
$action = filter_input(INPUT_GET, _ACTION_KEY);
if (null == $action) {
    $action = _DEFAULT_ACTION;
}

//action security check

if (!@ereg('^[a-zA-Z_]+$', $action)) { // TODO: ereg is deprecated, replace it
    throw new Exception('Invalid action! Unsuitable characters detected in action name!');
}
//what if is a special function? (eg: __construct, __set, __get)
if (@ereg("^_{2}", $action)) { // TODO: ereg is deprecated, replace it
    throw new Exception('Action is a special function. Access denied!');
}

ClassLoader::addIncludePath(_DIR_PROJECT . '/includes');
ClassLoader::addIncludePath(_DIR_PROJECT . '/includes/classes');
// ClassLoader::addIncludePath(_APPS_PATH . '/CdCollection/modules/CdCollection');

// action method exists?
$method = Reflect::getReflectionMethod($module_classname, $action);

//method is public?
if (!$method->isPublic()) {
    throw new Exception('Invalid action! Method ' . $module_classname . '.' . $action . '() is not public!');
}

unset($method);

//action is ok
//next, we do a security check for all other params
if (_SECURITY_ENFORCE) {
    //check file
    $security_class = $module_classname . 'Security';
    if (!is_file($file = (_DIR_MODULES . '/' . $_module_path . '/class.' . $security_class . '.php'))) {
        throw new Exception('Security class ' . $security_class . ' missing!');
    }
    require_once $file;

    $class = Reflect::getReflectionClass($security_class); // throws exception if the class is not existing
    $security = new $security_class ();

    //checking _GET, _POST and _COOKIE variables
    if (_SECURITY_ENFORCE_GET)    { Dispatcher::checkVariables($class, $security, '_GET');    }
    if (_SECURITY_ENFORCE_POST)   { Dispatcher::checkVariables($class, $security, '_POST');   }
    if (_SECURITY_ENFORCE_COOKIE) { Dispatcher::checkVariables($class, $security, '_COOKIE'); }
    unset($class); // we don't need this anymore
}

// params are ok. calling the requested action
Factory::getDispatcher()->executeAction($module_classname, $action);

// $elapsed_time = (float) $benchmark->stop();

if (defined('_USE_SMARTY') && _USE_SMARTY) {
    // $_smarty->assign('elapsed_time', $elapsed_time);
    $_smarty->assign('_action', $action);
    $_smarty->display('index.tpl');
}

// EOF
