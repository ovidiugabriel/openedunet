<?php

/**
 * This is a port of class described at: 
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CResponse.html
 */
class CResponse {
    // Member functions of CResponse class implement the methods of the Response object.
    
    /**
     * Adds a specified cookie with attributes  
     * 
     * @proto public addCookie(cookie:CCookie):Int
     */
    public function addCookie($cookie){}
    
    /** 
     * Adds a HTTP header to the HTTP response. 
     * 
     * @param array $headers
     * @proto public addHeader(headers:StringMap):Int
     */
    public function addHeader($headers) {
        
    }
    
    /**	
     * Begins to send output. 
     * 
     * @deprecated
     * @proto public begin():Int
     */
    public function begin(){}
    
    /**	Ends standard output. */
    public function end(){}
    
    /** Causes the server to stop processing a script and return. */
    public function exit(){}
    
    /** Sends buffered HTML output immediately. */
    public function flush(){}
    
    /** Retrieves the value of the Buffer property. */
    public function getBuffer(){
        return $this->Buffer;
    }
    
    /** Retrieves the value for the CacheControl property. */
    public function getCacheControl(){
        return $this->CacheControl;
    }
    
    /** Retrieves the value for the CharSet property. */
    public function getCharSet(){
        return $this->CharSet;
    }
    
    /** Retrieves the value of the ContentType property. */
    public function getContentType(){
        return $this->ContentType;
    }
    
    /**	Retrieves the value of the Expires property. */
    public function getExpires(){
        return $this->Expires;
    }
    
    /** Retrieves the value of the ExpiresAbsolute property. */
    public function getExpiresAbsolute(){
        return $this->ExpiresAbsolute;
    }
    
    /** Retrieves the value of the Status property. */
    public function getStatus(){
        return $this->Status;
    }
    
    /** 
     * PICS has been superseded by the Protocol for Web Description Resources (POWDER)
     * @deprecated
     */
    public function PICS($headerValue){}
    
    /** Causes the browser to attempt to connect to a different URL. */
    public function redirect($url){}
    
    /** Sets the value of the Buffer property. */
    public function setBuffer($buffering){
        $this->Buffer = $buffering;
    }
    
    /** Sets the value of the CacheControl property. */
    public function setCacheControl($cacheControl){
        this->CacheControl = $cacheControl;
    }
    
    /** Sets the value of the Charset property. */
    public function setCharSet($charSet){
        $this->Charset = $charSet;
    }
    
    /**	Sets the value of the ContentType property. */
    public function setContentType($contentType){
        $this->ContentType = $contentType;
    }
    
    /** Sets the value of the Expires property. */
    public function setExpires($expiresMinutes){
        $this->Expires = $expiresMinutes;   
    }
    
    /** Sets the value of the ExpiresAbsolute property. */
    public function setExpiresAbsolute($expiresAbsolute){
        $this->ExpiresAbsolute = $expiresAbsolute;
    }
    
    /** Sets the value of the Status property. */
    public function setStatus($status){
        $this->Status = $status;
    }
    
    /** 
     * Set the title of an HTML page  
     * @deprecated
     */
    public function title($title){}
}
