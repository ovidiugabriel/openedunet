<?php

/** 
 * Design inspired by: http://qt-jambi.org/
 * Documentation of Java version at: https://doc.qt.io/archives/qtjambi-4.5.2_01/com/trolltech/qt/sql/QSqlDatabase.html
 * See: Package com.trolltech.qt.sql 
 *
 * IMPORTANT!
 * >>> IT IS NOT ALLOWED TO COPY THE IMPLEMENTATION OF THE QT-JAMBI. <<<
 */
declare_namespace('sql', __FILE__);

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
 * @see http://doc.qt.digia.com/qtjambi-4.5.2_01/com/trolltech/qt/sql/QSqlDatabase.html
 */
class sql_Database { 
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
     * @proto public open(?user:String, ?password:String):Bool
     */
    public final function open($user = null, $password = null) {
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000886 begin
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000886 end
    }
  
    /**
     * @param string $name
     * @proto public setDatabaseName(name:String):Void
     */
    public final function setDatabaseName($name) {
        $this->databaseName = $name;
    }
    
    /** 
     * @return string
     * @proto public databaseName():String 
     */
    public final function databaseName() {
        return $this->databaseName;
    }
  
    /** 
     * @param string $host
     * @proto public setHostName(host:String):Void
     */
    public final function setHostName($host) {
        $this->hostName = $host;
    }

    /** 
     * @return string
     * @proto public hostName():String
     */    
    public final function hostName() {
        return $this->hostName;
    }

    /**
     * @param string $password
     * @proto public setPassword(password:String):Void
     */
    public final function setPassword($password) {
        $this->password = $password;
    }

    /** 
     * @return string
     * @proto public password():String
     */    
    public final function password() {
        return $this->password;
    }
  
    /**
     * @param integer $port
     * @proto public setPort(port:Int):Void
     */
    public final function setPort($port) {
        $this->port = intval($port);
    }
    
    /** 
     * @return integer
     * @proto public port():Int
     */
    public final function port() {
        return intval($this->port);
    }
   
    /**
     * @param string $name
     * @proto public function setUserName(name:String):Void
     */
    public final function setUserName($name) {
        $this->userName = $name;
    }

    /** 
     * @return string
     * @proto public userName():String
     */    
    public final function userName() {
        return $this->userName;
    }
  
} /* end of class Database */

/** 
 * @access public
 * @see http://doc.qt.digia.com/qtjambi-4.5.2_01/com/trolltech/qt/sql/QSql.Location.html
 */
class sql_Location extends Enum {
    const BeforeFirstRow = 0;
    const AfterLastRow   = 1;
}

/** 
 * @access public
 * @see http://doc.qt.digia.com/qtjambi-4.5.2_01/com/trolltech/qt/sql/QSql.NumericalPrecisionPolicy.html
 */
class sql_NumericalPrecisionPolicy extends Enum {
    const LowPrecisionInt32  = 0;
    const LowPrecisionInt64  = 1;
    const LowPrecisionDouble = 2;
    const HighPrecision      = 3;
}

class sql_ParamType {
}

class sql_ParamTypeFlag extends Enum {
    const Binary = 0;
    const In     = 1;
    const InOut  = 2;
}

class sql_TableType extends Enum {
    const AllTables    = 1;
    const SystemTables = 2;
    const Tables       = 3;
    const Views        = 4;
}

// EOF
