<?php

/** 
 * Design inspired by: http://qt-jambi.org/
 * Documentation of Java version at: https://doc.qt.io/archives/qtjambi-4.5.2_01/index.html
 * See: Package com.trolltech.qt.sql 
 *
 * IMPORTANT!
 * >>> IT IS NOT ALLOWED TO COPY THE IMPLEMENTATION OF THE QT-JAMBI. <<<
 */
declare_namespace('sql');

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
    public final function databaseName($name = null) 
    {
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:000000000000088E begin
        if ($name !== null) {      // called as a setter
            $this->databaseName = $name;
            return $this;
        }    
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:000000000000088E end
    
        // called as a getter
        return $this->databaseName;
    }
  
    /** 
     * @param string $host
     */
    public final function hostName($host = null) {
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000892 begin
        if ($host !== null) {       // called as a setter
            $this->hostName = $host;
            return $this;
        }
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000892 end

        // called as a getter
        return $this->hostName;
    }

    /**
     * @param string $password
     */
    public final function password($password = null) {
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000895 begin
        if ($password !== null) {       // called as a setter
            $this->password = $password;
            return $this;
        }
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000895 end

        // called as a getter
        return $this->password;
    }
  
    /**
     * @param integer $p
     */
    public final function port($p = null) {
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000897 begin
        if ($p !== null) {       // called as a setter
            $this->port = intval($p);
            return $this;
        }
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000897 end
    
        // called as a getter
        return intval($this->port);
    }
   
    /**
     * @param string $name
     */
    public final function userName($name = null) {
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000899 begin
        if ($name !== null) {       // called as a setter
            $this->userName = $name;
            return $this;
        }
        // section 10--39--78-17-7cd388f4:14a19eaa541:-8000:0000000000000899 end

        // called as a getter
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
  
    /** 
     * @return dictionary
     */
    static public function values() {
        return parent::values(__CLASS__);
    }
  
    /** 
     * @param string $name
     * @return integer
     * @proto static public valueOf(name:String):Int
     */
    static public function valueOf($name) {
        $values = self::values();
        return $values[$name];
    }  
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
  
    /** 
     * @return dictionary
     */
    static public function values()
    {
        return parent::values(__CLASS__);
    }

    /**
     * @param string $name
     * @return integer
     */
    static public function valueOf($name)
    {
        $values = self::values();
        return $values[$name];
    }  
}

class sql_ParamType {
}

class sql_ParamTypeFlag extends Enum {
    const Binary = 0;
    const In     = 1;
    const InOut  = 2;

    /** 
     * @return dictionary
     */
    static public function values() {
        return parent::values(__CLASS__);
    }

    /** 
     *  @param   string $name
     * @return integer
     */
    static public function valueOf($name) {
        $values = self::values();
        return $values[$name];
    } 
}

class sql_TableType extends Enum {
    const AllTables    = 1;
    const SystemTables = 2;
    const Tables       = 3;
    const Views        = 4;

    /** 
     * @return dictionary
     */
    static public function values() {
        return parent::values(__CLASS__);
    }

    /** 
     * @param string $name
     * @return integer
     */
    static public function valueOf($name) {
        $values = self::values();
        return $values[$name];
    }   
}

// EOF
