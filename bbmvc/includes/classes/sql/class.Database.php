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

/** Represents a connection to a database */
class Database { 
  /* public class QSqlDatabase
        extends QtJambiObject
        implements java.lang.Cloneable 
   */
   
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
  
  /* 
   * @proto public final void setHostName(java.lang.String host) 
   */
  public final function setHostName($host) {
    $this->hostName = $host;
  }
  
  /**
   * @param string $password
   * @proto public final void setPassword(java.lang.String password)
   */
  public final function setPassword($password) {
    $this->password = $password;
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
   * @param string $name
   * @proto public final void setUserName(java.lang.String name)
   */
  public final function setUserName($name) {
    $this->userName = $name;
  }
}

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
