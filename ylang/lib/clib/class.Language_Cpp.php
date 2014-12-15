<?php

class Language_Cpp {

    public function import($class_name) {
        return "#include \"{$class_name}.h\"";
    }

    public function singleton_text($type, $constants, $properties = array()) {

	    $f_opt   = coral_get_flags();
	    $g_types = coral_get_types();

            $out = '';
	    $name = strtolower($type);

	    if ($f_opt["HEADER_PUBLIC"]) {
                $out .= EOL;

		/*
		 * High Integrity CPP Rule 3.1.1 Organise 'class' definitions by
		 * access level, in the following order : 'public', 'protected', 'private'.
		 */
		// generate type declaration
		$out .= "class $type {" . EOL;

		if (isset($properties['public']) && (count($properties['public']) > 0)) {
		    $out .= "public:" . EOL;

		    foreach ($constants as $const_name => $const_val) {
		        $out .= tab() . "static const auto $const_name = $const_val;" . EOL;
		    }

		    foreach ($properties['static']['public'] as $var_name => $var_type ) {
		        $out .= tab() . "static $var_type[0] $var_name;" . EOL;
		    }
		    $out .= EOL;
		    foreach ($properties['public'] as $var_name => $var_type ) {
		        $out .= (tab() . "$var_type $var_name;") . EOL;
		    }
		    $out .= EOL;
		}

		//
		// generate private members
		//
		$out .= ("private:") . EOL;

		if (isset($properties['static']['private']) && (count($properties['static']['private']) > 0) ) {
		    foreach ($properties['static']['private'] as $var_name => $var_type ) {
		        $out .= ("    static $var_type[0] $var_name;") . EOL;
		    }
		    $out .= EOL;
		}

		if (isset($properties['private']) && (count($properties['private']) > 0) ) {
		    foreach ($properties['private'] as $var_name => $var_type ) {
		        $out .= ("    $var_type $var_name;") . EOL;
		    }
		    $out .= EOL;
		}

		//
		// generate protected members
		//

		$out .= ("protected:") . EOL;
		if (isset($properties['static']['protected']) && (count($properties['static']['protected']) > 0) ) {

		    foreach ($properties['static']['protected'] as $var_name => $var_type ) {
		        $out .= ("    static $var_type[0] $var_name;") . EOL;
		    }
		    $out .= EOL;
		}

		if (isset($properties['protected']) && (count($properties['protected']) > 0) ) {
		    foreach ($properties['protected'] as $var_name => $var_type ) {
		        $out .= ("    $var_type $var_name;") . EOL;
		    }
		    $out .= EOL;
		}

		$out .= ("};") . EOL;
	    }

	    if ($f_opt["SOURCE"]) {
		// generate structure definition

		foreach ($properties['static']['public'] as $name => $elem) {
		    $out .= ("$elem[0] $type::$name = $elem[1];") . EOL;
		}

	//        println("struct T_{$type}_private {");

	//        foreach ($properties['private'] as $var_name => $var_type) {
	//            println("    $var_type $var_name;");
	//        }
	//        println("};");
	//        println();
	    }

	    if ($f_opt["SOURCE"]) {
		// generate instance static allocation of the singleton
	//        println("static $type g_$name;");
	//        println();
	    }

            return $out;
    }
}
