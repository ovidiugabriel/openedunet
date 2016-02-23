<?php 

/**
 * This is a port of the class described at:
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CRequest.html
 */
class Request {
    // Member functions of CRequest class implement the methods of the Request object.
    
    /** 
     * @var string 
     */
    private $input = null;
    
    /** 
     * Retrieves a cookie value by its name.
     * 
     * @param string $cookieName
     * @return string
     * @proto public getCookie(cookieName:String):php.NativeString
     */
    public function getCookie($cookieName) {
        return filter_input(INPUT_COOKIE, $cookieName);
    }
    
    /** 
     * Retrieves all cookies.
     * 
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
        $result = filter_input(INPUT_GET, $name);
        if ($result) {
            return $result;
        }
        return filter_input(INPUT_POST, $name);
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
        
        $get_data = filter_input(INPUT_GET, $name);
        if ($get_data) {
            foreach ($get_data as $value) {
                $forms[] = $value;
            }
        }
        
        $post_data = filter_input(INPUT_POST, $name);
        if ($post_data) {
            foreach ($post_data as $value) {
                $forms[] = $value;
            }
        }
        return $forms;
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
        return filter_input(INPUT_SERVER, $variableName);
    }

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
