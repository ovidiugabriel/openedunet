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

 /*
  * Copyright (c) 2015, ICE Control srl
  * All rights reserved.
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
  */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/* 26.09.2015           Initial revision                                     */
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
    
    /** 
     * @return integer
     * @proto static public getCurrentUserId():Int
     */
    static public function getCurrentUserId() {
        $user = JFactory::getUser();
        return (int) $user->id;
    }
    
    /** 
     * @return object
     * @proto static public getConfiguration():Dynamic
     */
    static public function getConfiguration() {
        static $config = null;
        if (null == $config) {
            $config = new JConfig();
        }
        return $config;
    }
    
    /**
     * @param string $lang
     * @return array
     * @proto static public getLanguageOverrides(lang:String):Dynamic
     */
    static public function getLanguageOverrides($lang) {
        
    }
    
    /** 
     * @return string
     * @proto static getMainURL():String
     */
    static public function getMainURL() {
        // TODO: Move it to another class. It has nothing to do with the platform.
        // It is based on PROTOCOL_SCHEME, HTTP_HOST and SCRIPT_NAME.
    }
    
    /**
     * @return string
     * @proto static getCurrentLocation():String
     */
    static public function getCurrentLocation() {
        // TODO: Move it to another class. It has nothing to do with the platform.
        // It is based on PROTOCOL_SCHEME, HTTP_HOST, REQUEST_URI.
    }
    
    /** 
     * @return array {database: ..., username: ..., password: ..., hostname: ...}
     * @proto static public getDatabaseConfiguration():Dynamic
     */
    static public function getDatabaseConfiguration() {
        $conf = self::getConfiguration();
        return array(
            'database' => $conf->db,
            'username' => $conf->user,
            'password' => $conf->password,
            'hostname' => $conf->host,
        );
    }
}

// EOF
