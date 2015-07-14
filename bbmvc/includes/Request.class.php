<?php 

/**
 * This is a port of the class described at:
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CRequest.html
 */
class Request {
    // Member functions of CRequest class implement the methods of the Request object.
    
    /** @var string */
    private $input = null;    
    
    /** 
     * Retrieves the bytes that were read by an HTTP POST.
     * 
     * @param integer $count
     * @return array
     * @proto public binaryRead(count:Int):php.NativeArray
     */
    public function binaryRead($count) {
        if (null === $this->input) {
            $this->input = file_get_contents('php://input');
        }
        return str_split(substr($this->input, 0, $count));
    }
    
    /** 
     * Retrieves a cookie value by its name.
     * 
     * @param string $cookieName
     * @return string
     * @proto public getCookie(cookieName:String):php.NativeString
     */
    public function getCookie($cookieName) {
        return $_COOKIE[$cookieName];
    }
    
    /**
     * Retrieves all cookies.
     * 
     * @return array - array of cookies
     * @proto public getCookies():php.NativeArray
     */
    public function getCookies() {
        return $_COOKIE;
    }
    
    /** 
     * Retrieves the value of a specified name which was read by POST or GET method. 
     * 
     * @param string $name
     * @return string
     * @proto public getForm(name:String):php.NativeString
     */
    public function getForm($name) {
        //
        // If the same parameter is sent in GET and POST arrays, then value of parameter
        // in POST array will overwrite the value received from GET array.
        //
        if (isset($_GET[$name])) {
            return $_GET[$name];
        }
        return $_POST[$name];
    }
    
    /** 
     * Retrieves all values of a specified name which were read by POST or GET method. 
     * 
     * @param string $name - containing the name of the specified item
     * @return array - containing the multiple values of the specified name
     * @proto public getForms(name:String):php.NativeArray
     */
    public function getForms($name) {
        $forms = array();
        if (isset($_GET[$name])) {
            foreach ($_GET[$name] as $value) {
                $forms[] = $value;
            }
        }
        
        if (isset($_POST[$name])) {
            foreach ($_POST[$name] as $value) {
                $forms[] = $value;
            }
        }
        return $form;
    }
    
    /** 
     * Retrieves all pairs of name and value that were read by POST or GET method. 
     * 
     * @return array
     * @proto public getFormNameValue():php.NativeArray
     */
    public function getFormNameValue() {
        return array_merge($_GET, $_POST);
    }
    
    /** 
     * Retrieves a specified ServerVariable value. 
     * 
     * 
     * @param string $variableName
     * @return string
     * @proto public getServerVariable(variableName:String):php.NativeString
     */
    public function getServerVariable($variableName) {
        return $_SERVER[$variableName];
    }
    
    /** 
     * Returns the size, in bytes, of the current request. 
     * 
     * @proto public getTotalBytes():Int
     */
    public function getTotalBytes() {
        if (null === $this->input) {
            $this->input = file_get_contents('php://input');
        }
        return strlen($this->input);
    }
}

// EOF
