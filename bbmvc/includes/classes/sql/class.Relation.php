<?php

declare_namespace('sql');

class sql_Relation {
    private $is_valid = false;
    
    /**
     * @param string $aTableName
     * @param string $indexCol
     * @param string $displayCol
     * @proto public new(?aTableName:String, ?indexCol:String, ?displayCol:string)
     */
    public function __construct($aTableName = null, $indexCol = null, $displayCol = null) {
        $this->is_valid = true;
    }
    
    /**
     * Returns the column from table tableName() that should be presented to the user instead of a foreign key
     * 
     * @return string
     * @proto public displayColumn():String
     */
    public function displayColumn() {
        
    }
    
    /**
     * Returns the index column from table tableName() to which a foreign key refers.
     * 
     * @return string
     * @proto public indexColumn():String
     */
    public function indexColumn() {
        
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
        
    }
}
