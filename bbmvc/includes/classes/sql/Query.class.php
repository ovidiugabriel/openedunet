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
     * @param array $args
     * @proto static public escape(query:String, ?args:Array):String
     */
    static public function escape($query, $args = null) {
        if (!is_array($args)) {
            $args = func_get_args();
            array_shift($args);
        }
        // FIXME: Replace identity with escape function
        $args = array_map(IDENTITY_FUNCTION, $args);
        array_unshift($args, $query);
        return call_user_func_array('sprintf', $args);
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
     * Provides also escaping function.
     * 
     * @see https://ellislab.com/codeigniter/user-guide/database/queries.html
     * 
     * @param string $placeholder
     * @param mixed $value
     * @return void
     */
    public final function bindValue($placeholder, $value, $type = null) {
        // TODO: Escape value (type is used by escape function)
        $this->vars[$placeholder] = $value;
    }
    
    /**
     * @proto public execute(?query:String):Bool
     */
    public final function execute($query = null) {
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
