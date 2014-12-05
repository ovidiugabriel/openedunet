<?php

/**
 * Design inspired by: http://qt-jambi.org/
 * Documentation of Java version at: http://doc.qt.digia.com/qtjambi-4.5.2_01/index.html
 * See: Package com.trolltech.qt.sql
 */
namespace sql;

/** 
 * Database error information 
 */
class Error {
}

class Error_ErrorType {
  const ConnectionError  = 0;
  const NoError          = 1;
  const StatementError   = 2;
  const TransactionError = 3;
  const UnknownError     = 4;
}
