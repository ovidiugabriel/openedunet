<?php

class Escapade {
    private $esp_params;

    private function __construct() {}

    static private function getInstance() {
        $class = __CLASS__;
        static $instance = null;
        
        if (null == $instance) {
            $instance = new $class();
        }
        return $instance;
    }

    static public function getFunction($func) {
        return array(self::getInstance(), 'function_' . $func);
    }
    
    static public function getBlock($func) {
        return array(self::getInstance(), 'block_' . $func);
    }

    public function function_esp(array $params, Smarty_Internal_Template $tpl) {
        foreach ($params as $key => $value) {
            $this->esp_params[$key] = $value;
        }
    }

    public function function_dbopen(array $params, $tpl) {
        // print_r($params);
        /*
            [database] => database
            [host] => host
            [name] => name
            [password] => password

        */
    }

    public function block_sql(array $params, $content, Smarty_Internal_Template $tpl, &$repeat) 
    {
        var_dump(__METHOD__);
        print_r($params);
    }

    public function function_recordcount(array $params, $tpl) {
        var_dump(__METHOD__);
        print_r($params);
    }

    public function function_stop(array $params, $tpl) {
        var_dump(__METHOD__);
        print_r($params);
    }

    // The current hour (one or two digits, 24 hour format)
    public function function_h(array $params, $tpl) {
        return (int) date('H');
    }

    // The current hour (two digits, 24 hour format)
    public function function_hh(array $params, $tpl) {
    }

    // 'HHH'     => 0, // The current hour (one or two digits, 12 hour format)
    public function function_hhh() {}

    // 'N'       => 0, // The current minute (one or two digits)
    public function function_n() {}

    // 'NN'      => 0, // The current minute (two digits)
    public function function_nn() {}

    // 'D'       => 0, // The current day of the month (one or two digits)
    public function function_d() {}

    // 'DD'      => 0, // The current day of the month (two digits)
    public function function_dd() {}

    // 'YY'      => 0, // The current year (last two digits)
    public function function_yy() {}

    // 'YYYY'    => 0, // The current year (four digits)
    public function function_yyyy() {}

    // 'WD'      => 0, // The current day of the week (one digit, Sunday = 0)
    public function function_wd() {}

    // 'MONTH'   => 0, // The current month name
    public function function_month() {}

    // 'DAY'     => 0, // The current day of the week name
    public function function_day() {}

    // 'TOD'     => tod(), // Either morning, afternoon or evening
    // Either morning, afternoon or evening
    public function function_tod() {
        return "TimeOfDay";
    }
    // 'AMPM'    => 0, // Either "AM" or "PM"
    public function function_ampm() {}

    /** 
     * Process ID of the currently running process
     */
    public function function_pid() {
        return getmypid();
    }

}
