<?php 

/**
 * This is a port of the class described at:
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CRequest.html
 */
class CRequest {
    // Member functions of CRequest class implement the methods of the Request object.
    
    /** 
     * Retrieves the bytes that were read by an HTTP POST.
     */
    public function binaryRead($count) {}
    
    /** 
     * Retrieves a cookie value by its name.
     */
    public function getCookie($cookieName) {}
    
    /**
     * Retrieves all cookies.
     * 
     * @return array - array of cookies
     */
    public function getCookies() {}
    
    /** Retrieves the value of a specified name which was read by POST or GET method. */
    public function getForm($name) {}
    
    /** Retrieves all values of a specified name which were read by POST or GET method. */
    public function getForms($name, $value) {}
    
    /** 
     * Retrieves all pairs of name and value that were read by POST or GET method. 
     * 
     * @return array(0->names:array, 1->values:array)
     */
    public function getFormNameValue() {}
    /** Retrieves a specified ServerVariable value. */
    public function getServerVariable($variableName) {}
    
    /** Returns the size, in bytes, of the current request. */
    public function getTotalBytes() {}
}

// EOF
