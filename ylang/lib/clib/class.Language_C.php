<?php

class Language_C {
    const GLOBAL_NAME_FORMAT  = 'g_%s';
    const GET_INSTANCE_FORMAT = '%s_getInstance';
    
    private function global_name($class_name) {
        return sprintf(self::GLOBAL_NAME_FORMAT, $class_name);
    }

    public function import($class_name) {
        return "#include \"{$class_name}.h\"";
    }

    // TODO: append to 2 different sections: to static globals declarations
    // and to public functions definitions
    // TODO: also append function prototype to a section of public function prototypes (header?)
    //
    public function singleton_text($class_name, array $constants, array $properties) {
        $global_name   = $this->global_name($class_name);
        $function_name = sprintf(self::GET_INSTANCE_FORMAT, $class_name);

        

        $txt = "static $class_name $global_name;\n";
        $txt .= "$class_name* $function_name(void)\n"; 
        $txt .= "{\n";
        $txt .= tab(). "return &$global_name;\n";
        $txt .= "}\n";
        return $txt;
    }
}
