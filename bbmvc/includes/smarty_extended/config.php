<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       config.php.php                                              */
/*                                                                           */
/*  Created on:  25.03.2016 at 10:30:56                                      */
/*  Email:       ovidiugabriel[ät]gmail.com                                  */
/*  Copyright:   (C) 2016 ICE Control srl. All Rights Reserved.              */
/*                                                                           */
/*  $Id$                                                                     */
/*                                                                           */
/* ************************************************************************* */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/*                                                                           */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/*                                                                           */
/* INCLUDE FILES (DEPENDENCIES)                                              */
/*                                                                           */

/*                                                                           */
/* USER DEFINED INCLUDES                                                     */
/*                                                                           */

/*                                                                           */
/* USER DEFINED CONSTANTS                                                    */
/*                                                                           */

/*                                                                           */
/* TYPES                                                                     */
/*                                                                           */

/*                                                                           */
/* --- PUBLIC OPERATIONS (GLOBAL FUNCTIONS) ---                              */
/*                                                                           */


ClassLoader::removeClass('Smarty_Internal_Compile_Url');
ClassLoader::removeClass('Smarty_Internal_Compile_A');
ClassLoader::removeClass('Smarty_Internal_Compile_Aclose');

/*
 * The type must be one of:
 *      - Smarty::PLUGIN_FUNCTION
 *      - Smarty::PLUGIN_BLOCK
 *      - Smarty::PLUGIN_MODIFIER
 */
return array(
    array('type' => Smarty::PLUGIN_BLOCK,    'name' => 'a'),
    array('type' => Smarty::PLUGIN_FUNCTION, 'name' => 'lprintf'),
    array('type' => Smarty::PLUGIN_FUNCTION, 'name' => 'url')
);
