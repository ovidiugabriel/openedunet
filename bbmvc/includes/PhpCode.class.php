<?php

class PhpCode {
    /**
     * @var string
     */
    private $php_code;
    
    /** 
     * @param string $php_code
     */
    public function __construct($php_code) {
        $this->php_code = $php_code;
    }
    
    /** 
     * @return void
     */
    public function evaluate() {
        eval( trim(substr($this->php_code, 5)) );
    }
    
    /** 
     * @param SplFileObject $file
     * @return PhpCode
     */
    static public function fromFile(SplFileObject $file) {
        ob_start();
        $file->fpassthru();
        $code = ob_get_clean();
        return new PhpCode($code);
    }
}
