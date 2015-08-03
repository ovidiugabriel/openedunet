<?php

// namespace sql;

/** 
 * Manipulates the fields in database tables and views 
 */
class sql_Field {
}

class sql_Field_RequiredStatus {
    const Optional = 0;
    const Required = 1;
    const Unknown  = 2;

    static public function values()
    {
        return array(
            'Optional' => self::Optional,
            'Required' => self::Required,
            'Unknown'  => self::Unknown,
        );
    }

    static public function valueOf($name)
    {
        $values = self::values();
        return $values[$name];
    }  
}
