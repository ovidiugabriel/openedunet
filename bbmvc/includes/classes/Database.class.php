<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       Database.class.php                                          */
/*  Purpose:     Database Class                                              */
/*                                                                           */
/*  Created on:  16.07.2013 at 10:44:28                                      */
/*  Email:       ovidiugabriel@gmail.com                                     */
/*               mihai@secure-hosting.ro                                     */
/*  Copyright:   (C) 2013-2015 ICE Control srl. All Rights Reserved.         */
/*                                                                           */
/*  $Id$                                                                     */
/*                                                                           */
/* ************************************************************************* */

/*
 * Copyright (c) 2007-2015, ICE Control srl, BMR Soft srl. (Brehar Mihai-Tudor)
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
/* 13.01.2016           Fixed open() default params logic                    */
/* 20.10.2015           Synchronized open source implementation              */
/* 16.07.2013           Added begin(), commit() and rollback()               */
/*                          as transaction processing functions              */
/*                      Capitals in update()                                 */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

class DuplicateEntryException extends Exception {

}

/**
 * @access public
 */
interface IDatabase {
    /**
     * Invalid resource.
     */
    const INVALID_RESOURCE = -1;

    /**
     *
     * @param  string $query
     * @return integer
     */
    public function query($query);

    /**
     *
     * @param  integer $res_num
     * @return array
     */
    public function nextRow($res_num);

    /**
     *
     * @param  string $table
     * @param  array $a_values
     * @return integer
     */
    public function insert($table, array $a_values);

    /**
     *
     * @param  string $table
     * @param  array $a_values
     * @param  string $where
     * @return integer
     */
    public function update($table, array $a_values, $where);

    /**
     *
     * @param integer $flags
     * @param string $name
     * @return boolean
     */
    public function begin_transaction($flags = 0, $name = null);

    /**
     *
     * @param integer $flags
     * @param string $name
     * @return boolean
     */
    public function commit($flags = 0, $name = null);

    /**
     *
     * @param integer $flags
     * @param string $name
     * @return boolean
     */
    public function rollback($flags = 0, $name = null);
}

/**
 * @access public
 */
class Database extends mysqli implements IDatabase {

    /**
     * @var Database
     */
    private static $instance;

    /**
     *
     * @var array
     */
    private static $res = array();

    /**
     * Fisrt valid index we use resource count from index 1, to avoid problems
     * when caller thinks that resource id=0 is an error.
     *
     * @var integer
     */
    private static $res_count = 1;
    // TODO: Remove res_count since you can count number of elements in self::$res

    /**
     * @var array
     */
    private $history = array();

    /**
     *
     * @var string
     */
    private $db_host = '';

    /**
     *
     * @var string
     */
    private $db_name = '';

    /**
     *
     * @var string
     */
    public $last_query = '';

    /**
     * Singleton. Private constructor.
     */
    private function __construct() {}

    /**
     *
     * @param string $username
     * @param string $password
     */
    public function open($username = null, $password = null) {
        if ((null == $username) && (null == $password)) {
            $username = _DB_USER;
            $password = _DB_PASS;
        }

        if (null == $this->db_host) {
            $this->db_host = _DB_HOST;
        }

        if (null == $this->db_name) {
            $this->db_name = _DB_NAME;
        }
        parent::mysqli($this->db_host, $username, $password, $this->db_name);
    }

    /**
     *
     * @param string $name
     * @return void
     */
    public function setDatabaseName($name) {
        $this->db_name = $name;
    }

    /**
     *
     * @param string $hostname
     * @return void
     */
    public function setHostName($hostname) {
        $this->db_host = $hostname;
    }

    /*
    public function __destruct() {
        foreach (self::$res as $resource) {
            $resource[$res]->free_result();
        }
    }
     *
     */

    /**
     *
     * @param string $driver
     * @param type $config_name
     * @param array $config
     * @return Database
     * @proto static public factory(driver:String, configName:String, ?config:php.NativeArray):Database
     */
    static public function factory($driver, $config_name = 'default', array $config = null) {
        switch ($driver) {
            /*
            case "mssql_odbc":
                require_once dirname(__FILE__) . "/class.MicrosoftSQL.php";
                return MicrosoftSQL::getInstance($config, $config_name);
*/
            case 'mysqli':
                return Database::getInstance($config_name, $config);
            default:
                # code...
                break;
        }
    }

    /**
     * Creates a connection to a mysql database using the given configuration
     *
     * @param string $config_name
     * @param array $config
     * @return Database
     * @proto static public getInstance(configName:String, ?config:php.NativeArray):Database
     */
    static public function getInstance($config_name = 'default', array $config = null) {
        if (!isset(self::$instance[$config_name])) {
            $class = __CLASS__;
            self::$instance[$config_name] = new $class();

            if (null != $config) {
                self::$instance[$config_name]->setHostName($config['hostname']);
                self::$instance[$config_name]->setDatabaseName($config['database']);
                self::$instance[$config_name]->open($config['username'], $config['password']);
            } else {
                self::$instance[$config_name]->open();
            }
        }

        return self::$instance[$config_name];
    }

    /**
     * @param  mysqli_result $res
     * @return integer
     */
    static private function push_resource(mysqli_result $res) {
        $res_num = self::$res_count++;

        $num_rows = 0;

        if (is_object($res)) {
            $num_rows = mysqli_num_rows($res); // better for PHP 5.2 than $res->num_rows
        }
        self::$res[$res_num] = array('res' => $res, 'num_rows' => $num_rows);

        return (int) $res_num;
    }

    /**
     *
     * @return string
     */
    public function last_query() {
        return $this->last_query;
    }

    /**
     *
     * @return array
     */
    public function history() {
        return $this->history;
    }

    /**
     * @override
     * @param string $query
     * @return integer
     */
    public function query($query) {
        $this->history[] = $query;
        $this->last_query = $query;

        $res = parent::query($query);
        $res_num = self::INVALID_RESOURCE;  // Initialize with an 'Invalid index'.
        if (false === $res) {
            if ($this->errno != 0) {
                throw new Exception("Mysql Error: $this->error<br />Query: $query", $this->errno);
            }
        } elseif (true !== $res) {
            $res_num = (int) self::push_resource($res);
        }
        // default else: $res will be boolean(true) for INSERT and UPDATE queries

        if ($this->errno != 0) {
            throw new Exception("Mysql Error: $this->error<br />Query: $query", $this->errno);
        }

        if (strpos($query, ' SQL_CALC_FOUND_ROWS ')) {
            $res_tmp = $this->query('SELECT FOUND_ROWS() AS found_rows');
            $row_tmp = $this->nextRow($res_tmp);

            self::$res[$res_num]['found_rows'] = $row_tmp['found_rows'];
        }
        return (int) $res_num;
    }

    /**
     *
     * @param string $query
     * @return void
     */
    public function real_query($query) {
        $this->history[] = $query;
        $this->last_query = $query;

        parent::real_query($query);

        if ($this->errno != 0) {
            throw new Exception("Mysql Error: $this->error<br />Real Query: $query", $this->errno);
        }

    }

    /**
     *
     * @return integer
     */
    public function store_result() {
        return (int) $this->push_resource(parent::store_result());
    }

    /**
     *
     * @param integer $res_num
     * @return array
     */
    public function nextRow($res_num) {

        $res = self::$res[$res_num]['res'];

        $row = $res->fetch_assoc();

        if ($row == null) {
            $res->free_result();
            unset(self::$res[$res_num]);
        }

        return $row;
    }

    /**
     *
     * @param integer $res_num
     * @return integer
     */
    public function foundRows($res_num) {
        return (int) self::$res[$res_num]['found_rows'];
    }

    /**
     *
     * @param integer $res_num
     * @return integer
     */
    public function numRows($res_num) {
        return (int) self::$res[$res_num]['num_rows'];
    }

    /**
     *
     * @param string $table
     * @param array $a_values
     * @return integer
     */
    public function insert($table, array $a_values) {
        /*
         * $a_values is an array looking like this:
         *
         * array(	"firstname"	=> "John",
         * 			"lastname" 	=> "Doe");
         *
         * So the insert query will be "INSERT INTO $table (`firstname`, `lastname`) VALUES ('John', 'Doe')"
         */

        $fields = '';
        $values = '';

        // FIXME: Ensure proper escaping of $value, filter $field.
        foreach ($a_values as $field => $value) {
            $fields .= "`{$field}`, ";
            $values .= "'" . addslashes($value) . "', ";
        }

        $s_fields = substr($fields, 0, strlen($fields) - 2);
        $s_values = substr($values, 0, strlen($values) - 2);

        $query = "INSERT INTO $table ($s_fields) VALUES ($s_values)";

        try {
            $this->query($query);
        } catch (Exception $ex) {
            // TODO: Use enum for numeric codes.
            if (1062 == $ex->getCode()) {
                throw new DuplicateEntryException($ex->getMessage(), 1062);
            }
        }
        return (int) $this->insert_id;
    }

    /**
     *
     * @param string $table
     * @param array $a_values
     * @param mixed $where
     * @return integer
     */
    public function update($table, array $a_values, $where, $where_val = null) {
        /*
         * $a_values is an array. Check the "insert" function above for more details.
         */

        $fields = '';

        foreach ($a_values as $field => $value){
            $fields .= "`{$field}` = '" . addslashes($value) . "', ";
        }

        $s_fields = substr($fields, 0, strlen($fields) - 2);

        if (null == $where_val) {
            $query = "UPDATE $table SET $s_fields $where";
        } else {
            // FIXME: Ensure escaping of $where_val by type
            $query = "UPDATE $table SET $s_fields WHERE `$where` = '$where_val' ";
        }

        $this->query($query);

        return (int) $this->affected_rows;
    }

    /**
     *
     * @param string $sp
     * @param array $params
     * @return mixed
     */
    public function call($sp, $params) {
        return $this->$sp($params);
    }

    // -------------------------------------------------------------------------

    public function get() {
        // TODO: Implement
    }

    public function delete() {
        // TODO: Implement
    }
}

// EOF
