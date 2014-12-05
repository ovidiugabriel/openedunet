<?php

/**
 * Design inspired by: http://qt-jambi.org/
 * Documentation of Java version at: http://doc.qt.digia.com/qtjambi-4.5.2_01/index.html
 * See: Package com.trolltech.qt.sql
 */
namespace sql;

/** 
 * Abstract base class for accessing specific SQL databases 
 */
abstract class Driver {
  /* 
    public abstract class QSqlDriver
      extends QObject
  */
}

class Driver_DriverFeature extends Enumeration {
  const Transactions           = 1;
  const QuerySize              = 2;
  const BLOB                   = 3;
  const Unicode                = 4;
  const PreparedQueries        = 5;
  const NamedPlaceholders      = 6;
  const PositionalPlaceholders = 7;
  const LastInsertId           = 8;
  const BatchOperations        = 9;
  const SimpleLocking          = 10;
  const LowPrecisionNumbers    = 11;
  const EventNotifications     = 12;
  const FinishQuery            = 13;
  const MultipleResultSets     = 14;

  static public function values()
  {
    return parent::values(__CLASS__);
  }

  static public function valueOf($name)
  {
    $values = self::values();
    return $values[$name];
  }
}

class Driver_IdentifierType {
  const FieldName = 1;
  const TableName = 2;
  
  static public function values()
  {
    return array(
      'FieldName' => self::FieldName,
      'TableName' => self::TableName,
    );
  }
  
  static public function valueOf($name)
  {
    $values = self::values();
    return $values[$name];
  }  
}

class Driver_StatementType {
  const DeleteStatement = 1;
  const InsertStatement = 2;
  const SelectStatement = 3;
  const UpdateStatement = 4;
  const WhereStatement  = 5;

  static public function values()
  {
    return array(
      'DeleteStatement' => self::DeleteStatement,
      'InsertStatement' => self::InsertStatement,
      'SelectStatement' => self::SelectStatement,
      'UpdateStatement' => self::UpdateStatement,
      'WhereStatement'  => self::WhereStatement,
    );
  }

  static public function valueOf($name)
  {
    $values = self::values();
    return $values[$name];
  }    
}
