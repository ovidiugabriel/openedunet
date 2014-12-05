<?php

namespace sql;

/** 
 * Means of executing and manipulating SQL statements 
 */
class Query {
}

class Query_BatchExecutionMode {
  const ValuesAsColumns = 0;
  const ValuesAsRows    = 1;

  static public function values()
  {
    return array(
      'ValuesAsColumns' => self::ValuesAsColumns,
      'ValuesAsRows'    => self::ValuesAsRows,
    );
  }

}
