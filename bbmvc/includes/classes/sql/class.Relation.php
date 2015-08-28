<?php

declare_namespace('sql');

class sql_Relation {
    private $is_valid = false;
    private $table_name;
    private $index_column;
    private $display_column;
    
    /**
     * @param string $aTableName
     * @param string $indexCol
     * @param string $displayCol
     * @proto public new(?aTableName:String, ?indexCol:String, ?displayCol:string)
     */
    public function __construct($aTableName = null, $indexCol = null, $displayCol = null) {
        $this->table_name     = $aTableName;
        $this->index_column   = $indexCol;
        $this->display_column = $displayCol;
        
        if ($aTableName && $indexCol && $displayCol) {
            $this->is_valid = true;
        }
    }
    
    /**
     * Returns the column from table tableName() that should be presented to the user instead of a foreign key
     * 
     * @return string
     * @proto public displayColumn():String
     */
    public function displayColumn() {
        return $this->display_column;
    }
    
    /**
     * Returns the index column from table tableName() to which a foreign key refers.
     * 
     * @return string
     * @proto public indexColumn():String
     */
    public function indexColumn() {
        return $this->index_column;
    }
    
    /**
     * Returns true if the Relation object is valid; otherwise returns false.
     * 
     * @return boolean
     * @proto public isValid():Bool
     */
    public function isValid() {
        return (bool) $this->is_valid;    
    }
    
    /**
     * Returns the name of the table to which a foreign key refers.
     * 
     * @return string
     * @proto public tableName():String
     */
    public function tableName() {
        return $this->table_name;
    }
}
