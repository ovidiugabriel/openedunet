<?php

/** 
 * Design inspired by: http://qt-jambi.org/
 * Documentation of Java version at: http://doc.qt.digia.com/qtjambi-4.5.2_01/index.html
 * See: Package com.trolltech.qt.sql 
 *
 * IMPORTANT!
 * >>> IT IS NOT ALLOWED TO COPY THE IMPLEMENTATION OF THE QT-JAMBI. <<<
 */
namespace sql;

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000866-includes begin
// section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000866-includes end

/* user defined constants */
// section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000866-constants begin
// section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000866-constants end

/**
 * Represents a connection to a database
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Database { 
  // --- ASSOCIATIONS ---

  // --- ATTRIBUTES ---
   
  /** @var string $databaseName */
  private $databaseName;
  
  /** @var string $hostName */
  private $hostName;
  
  /** @var string $password */
  private $password;
  
  /** @var integer $port */
  private $port;
  
  /** @var string $userName */
  private $userName;

  // --- OPERATIONS ---
  
  /**
   * @param string $user
   * @param string $password
   * @return boolean
   *
   * @proto public final boolean open(java.lang.String user, java.lang.String password)
   * @proto public final boolean open()   
   */
  public final function open($user = null, $password = null) {

  }
  
  /**
   * @param string $name
   * @proto public final void setDatabaseName(java.lang.String name) 
   */
  public final function setDatabaseName($name) {
    $this->databaseName = $name;
  }
  
  // public final java.lang.String databaseName()
  public final function databaseName() {
    return $this->databaseName;
  }
  
  /* 
   * @proto public final void setHostName(java.lang.String host) 
   */
  public final function setHostName($host) {
    $this->hostName = $host;
  }
  
  // public final java.lang.String hostName()
  public final function hostName() {
    return $hostName;
  }
  
  /**
   * @param string $password
   * @proto public final void setPassword(java.lang.String password)
   */
  public final function setPassword($password) {
    $this->password = $password;
  }
  
  // public final java.lang.String password()
  public final function password() {
    return $this->password;
  }
  
  /**
   * @param integer $p
   *
   * @proto public final void setPort(int p)
   */
  public final function setPort($p) {
    $this->port = intval($p);
  }
  
  // public final int port()
  public final function port() {
    return intval($this->port);
  }
  
  /**
   * @param string $name
   * @proto public final void setUserName(java.lang.String name)
   */
  public final function setUserName($name) {
    $this->userName = $name;
  }
  
  // public final java.lang.String userName()
  public final function userName() {
    return $this->userName;
  }
} /* end of class Database */

class Location {
}

class NumericalPrecisionPolicy {
}

class ParamType {
}

class ParamTypeFlag {
}

class TableType {
}
