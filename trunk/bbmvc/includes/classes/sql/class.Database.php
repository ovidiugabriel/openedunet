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
  public final function open($user = null, $password = null) 
  {
    // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000886 begin
    // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000886 end
  }
  
 
  /**
   * @param string $name
   */
  public final function databaseName($name = '') 
  {
    $returnValue =  '';

    // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:000000000000088E begin
    if ($name != '') {      // called as a setter
      $this->databaseName = $name;
      $returnValue = $this;
    } else {                // called as a getter
      $returnValue = $this->databaseName;
      
    }
    // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:000000000000088E end

    return $returnValue;
  }
  
  /* 
   * @proto public final void setHostName(java.lang.String host) 
   */
  public final function setHostName($host) {
    // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000892 begin
    $this->hostName = $host;
    // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000892 end
  }
  
  /**
   * @proto public final java.lang.String hostName()
   */
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
  
  /**
   * @proto public final java.lang.String password()
   */
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
  
  /**
   * @proto public final int port()
   */
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
  
  /**
   * @proto public final java.lang.String userName()
  */
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
