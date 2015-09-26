<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       Entity.php                                                  */
/*                                                                           */
/*  Created on:  26.09.2015 at 11:25:38                                      */
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
/* 26.09.2015           Initial revision                                     */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

class Entity {
    /** 
     * @param string $type
     * @param array $args
     * @return object
     */
    public function asInstanceOf($type, array $args) {
        $reflect = new ReflectionClass($type);
        $ctor_args =  array();
        foreach ($args as $arg_name) {
            $ctor_args[] = $this->$arg_name;
        }
        return $reflect->newInstanceArgs($ctor_args);
    }
}
