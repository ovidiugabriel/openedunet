<?php

declare_namespace('sql');

/** 
 * Means of executing and manipulating SQL statements 
 */
class sql_Query {
    private $statement;
    private $vars = array();
    
    /** 
     * @proto public new(/* void */)
     */
    public function __construct($statement = null) {
        if (is_string($statement)) {
            $this->statement = $statement;
        }
    }
    
    /**
     * @param string $query
     * @return boolean
     * @proto public prepare(query:String):Bool
     */
    public final function prepare($query) {
        $this->statement = $query;
    }
    
    /**
     * @param string $placeholder
     * @param mixed $value
     * @return void
     */
    public final function bindValue($placeholder, $value) {
        $this->vars[$placeholder] = $value;
    }
    
    /**
     * @proto public exec(?query:String):Bool
     */
    public final function exec($query = null) {
        if (null === $query) {
            $query = $this->statement;
        }
        $query = str_replace(array_keys($this->vars), array_values($this->vars), $query);
        // TODO: execute the query now.
    }
}

class sql_Query_BatchExecutionMode extends Enum {
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
