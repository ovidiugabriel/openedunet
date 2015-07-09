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
     * @param Cookie $cookie
     * @return integer
     * @proto public addCookie(cookie:CCookie):Int
     */
    public function addCookie($cookie){}
    
    /** 
     * Adds a HTTP header to the HTTP response. 
     * 
     * @param array $headers
     * @return integer
     * @proto public addHeader(headers:StringMap):Int
     */
    public function addHeader($headers) {
        
    }
    
    /**	
     * Begins to send output. 
     * 
     * @deprecated
     * @return integer
     * @proto public begin():Int
     */
    public function begin(){}
    
    /**	
     * Ends standard output. 
     * 
     * @return nulltype
     * @proto public end():Void
     */
    public function end(){}
    
    /** 
     * Causes the server to stop processing a script and return. 
     * 
     * @proto public exit():Void
     * @return nulltype
     */
    public function exit(){}
    
    /** 
     * Sends buffered HTML output immediately. 
     * 
     * @return integer
     * @proto public flush():Int
     */
    public function flush(){}
    
    /** 
     * Retrieves the value of the Buffer property. 
     * 
     * When page output is buffered, the server does not send a response 
     * to the client until all of the server scripts on the current page have been processed, 
     * or until the CResponse::flush, CResponse::end or CResponse::exit function has been called.
     * 
     * @return boolean
     * @proto public getBuffer():Bool
     */
    public function getBuffer(){
        return $this->Buffer;
    }
    
    /** 
     * Retrieves the value for the CacheControl property. 
     * 
     * @return string
     * @proto public getCacheControl():String
     */
    public function getCacheControl(){
        return $this->CacheControl;
    }
    
    /** 
     * Retrieves the value for the CharSet property. 
     * 
     * @return string
     * @proto public getCharSet():String
     */
    public function getCharSet(){
        return $this->CharSet;
    }
    
    /** 
     * Retrieves the value of the ContentType property. 
     * 
     * @return string
     * @proto public getContentType():String
     */
    public function getContentType(){
        return $this->ContentType;
    }
    
    /**	
     * Retrieves the value of the Expires property. 
     * 
     * @return integer
     * @proto public getExpires():Int
     */
    public function getExpires(){
        return $this->Expires;
    }
    
    /** 
     * Retrieves the value of the ExpiresAbsolute property. 
     * 
     * @return string
     * @proto public getExpiresAbsolute():String
     */
    public function getExpiresAbsolute(){
        return $this->ExpiresAbsolute;
    }
    
    /** 
     * Retrieves the value of the Status property. 
     * 
     * @return string
     * @proto public getStatus():String
     */
    public function getStatus(){
        return $this->Status;
    }
    
    /** 
     * PICS has been superseded by the Protocol for Web Description Resources (POWDER)
     * @deprecated
     */
    public function PICS($headerValue){}
    
    /** 
     * Causes the browser to attempt to connect to a different URL. 
     * 
     * @param string $url
     * @return integer
     * @proto public redirect(url:String):Int
     */
    public function redirect($url){}
    
    /** 
     * Sets the value of the Buffer property. 
     * 
     * @param boolean $buffering
     * @return integer
     * @proto public setBuffer(buffering:Bool):Int
     */
    public function setBuffer($buffering){
        $this->Buffer = $buffering;
        return 0;
    }

    /** 
     * Sets the value of the CacheControl property. 
     * 
     * @param string $cacheControl
     * @return integer
     * @proto public setCacheControl(cacheControl:String):Int
     */
    public function setCacheControl($cacheControl){
        this->CacheControl = $cacheControl;
        return 0;
    }
    
    /** 
     * Sets the value of the Charset property. 
     * 
     * @param string $charSet
     * @return integer
     * @proto public setCharSet(charSet:String):Int
     */
    public function setCharSet($charSet){
        $this->Charset = $charSet;
        return 0;
    }
    
    /**	
     * Sets the value of the ContentType property. 
     * 
     * @param string $contentType
     * @return integer
     * @proto public setContentType(contentType:String):Int
     */
    public function setContentType($contentType){
        $this->ContentType = $contentType;
        return 0;
    }
    
    /** 
     * Sets the value of the Expires property. 
     * 
     * @param integer expiresMinutes
     * @return integer
     * @proto public setExpires(expiresMinutes:Int):Int
     */
    public function setExpires($expiresMinutes){
        $this->Expires = $expiresMinutes;
        return 0;
    }
    
    /** 
     * Sets the value of the ExpiresAbsolute property. 
     * 
     * @param string $expiresAbsolute
     * @return integer
     * @proto public setExpiresAbsolute(expiresAbsolute:String):Int
     */
    public function setExpiresAbsolute($expiresAbsolute){
        $this->ExpiresAbsolute = $expiresAbsolute;
        return 0;
    }
    
    /** 
     * Sets the value of the Status property. 
     * 
     * @param string $status
     * @return integer
     * @proto public setStatus(status:String):Int
     */
    public function setStatus($status){
        $this->Status = $status;
    }
    
    /** 
     * Set the title of an HTML page  
     * @deprecated
     */
    public function title($title){}
}
