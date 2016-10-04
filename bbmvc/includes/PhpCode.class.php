<?php

class PhpCode {
    /** 
     * @var SplFileObject
     */
    private $file;

    private function __construct() {}
    
    /** 
     * @param string $code
     * @param string $filepath
     * @return PhpCode
     */
    static public function fromString($code, $filepath) {
        if (file_put_contents($filepath, $code)) {
            $php_code = new PhpCode();
            $php_code->file = new SplFileObject($filepath);
            return $php_code;
        }
        return null;
    }
       
    /** 
     * @return string
     */
    public function __toString() {
        ob_start();
        $this->file->fpassthru();
        return ob_get_clean();
    }
    
    /** 
     * @param SplFileObject $file
     * @return PhpCode
     */
    static public function fromFile(SplFileObject $file) {
        $php_code = new PhpCode();
        $php_code->file = $file;
        return $php_code;
    }
    
    /** 
     * @return void
     */
    public function evaluate() {
        require $this->file->getPathname();
    }
}
