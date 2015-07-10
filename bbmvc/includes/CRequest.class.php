<?php 

/**
 * This is a port of the class described at:
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CRequest.html
 */
class CRequest {
    // Member functions of CRequest class implement the methods of the Request object.
    
    /** 
     * Retrieves the bytes that were read by an HTTP POST.
     * 
     * @param integer $count
     * @return string
     * @proto public binaryRead(count:Int):String
     */
    public function binaryRead($count) {}
    
    /** 
     * Retrieves a cookie value by its name.
     * 
     * @param string $cookieName
     * @return string
     * @proto public getCookie(cookieName:String):String
     */
    public function getCookie($cookieName) {
        // TODO: Return a Cookie object? (need cookies dict?)
    }
    
    /**
     * Retrieves all cookies.
     * 
     * @return array - array of cookies
     * @proto public getCookies():Array<String>
     */
    public function getCookies() {
        
    }
    
    /** 
     * Retrieves the value of a specified name which was read by POST or GET method. 
     * 
     * @param string $name
     * @return string
     * @proto public getForm(name:String):String
     */
    public function getForm($name) {
        
    }
    
    /** 
     * Retrieves all values of a specified name which were read by POST or GET method. 
     * 
     * @param string $name - containing the name of the specified item
     * @return array - containing the multiple values of the specified name
     * @proto public getForms(name:string):Array<String>
     */
    public function getForms($name) {
        
    }
    
    /** 
     * Retrieves all pairs of name and value that were read by POST or GET method. 
     * 
     * @return array(0->names:array, 1->values:array)
     */
    public function getFormNameValue() {
        
    }
    
    /** 
     * Retrieves a specified ServerVariable value. 
     */
    public function getServerVariable($variableName) {
        
    }
    
    /** 
     * Returns the size, in bytes, of the current request. 
     */
    public function getTotalBytes() {
        
    }
}

// EOF
