<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       Platform.php                                                */
/*                                                                           */
/*  Created on:  26.09.2015 at 02:43:39                                      */
/*  Email:       ovidiugabriel@gmail.com                                     */
/*  Copyright:   (C) 2015 ICE Control srl. All Rights Reserved.              */
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

/** 
 * Platform abstraction layer.
 */
class Platform {
    /** 
     * @return string
     * @proto static public getFormToken():String
     */
    static public function getFormToken() {
        return JSession::getFormToken();
    }
}

// EOF
