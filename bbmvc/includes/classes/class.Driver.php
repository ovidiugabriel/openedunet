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

class Driver_DriverFeature {
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
}

class Driver_IdentifierType {
}

class Driver_StatementType {
}
