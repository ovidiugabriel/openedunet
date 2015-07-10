<?php

/**
 * This is a port of class described at: 
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CResponse.html
 */
class CResponse {
    // Member functions of CResponse class implement the methods of the Response object.
    
    private $Buffer;
    private $CacheControl;
    private $CharSet;
    private $ContentType;
    private $Expires;
    private $ExpiresAbsolute;
    private $Status;
    
    /**
     * Adds a specified cookie with attributes.
     * 
     * PHP Version is using Expires instead of MaxAge.
     * 
     * @param Cookie $cookie
     * @param boolean $httponly
     * @return integer
     * @proto public addCookie(cookie:CCookie):Int
     */
    public function addCookie(CCookie $cookie, $http_only = false) {
        $result = setcookie($cookie->getName(), 
            $cookie->getValue(),
            $cookie->getExpires(),  // instead of MaxAge
            $cookie->getPath(),
            $cookie->getDomain(),
            $cookie->getSecure(),
            $http_only
        );
        $errcd = 1; // 0=success
        return (($result) ? 0 : $errcd);
    }
    
    /** 
     * Adds a HTTP header to the HTTP response. 
     * 
     * This function adds an HTTP header to the HTTP response. 
     * It always adds a new HTTP header to the response. 
     * It will not replace an existing header of the same name. 
     * Once a header has been added, it cannot be removed.
     * 
     * @param array $headers
     * @return integer - Upon successful completion, zero is returned. Otherwise, a value of non-zero is returned. 
     * @proto public addHeader(headers:StringMap):Int
     */
    public function addHeader($headers) {
        foreach ($headers as $name => $value) {
            header($name . ': ' . $value, false);
        }
        return 0;
    }
    
    /**	
     * Begins to send output. 
     * 
     * It is not mandatory for PHP version.
     * 
     * @deprecated
     * @return integer
     * @proto public begin():Int
     */
    public function begin() {
        
    }
    
    /**	
     * Ends standard output. 
     * 
     * This function will flush the buffer if the the Buffering is true and print out </body> and </html> 
     * tags to end an HTML page if its content type is text/html.
     * 
     * @deprecated
     * @return nulltype
     * @proto public end():Void
     */
    public function end() {
        
    }
    
    /** 
     * Causes the server to stop processing a script and return. 
     * 
     * This function will causes the server to stop processing a script and return the current response. 
     * When this function is called, the remaining contents of the file are not processed, 
     * and the buffer are flushed if the Buffering is true.
     * 
     * @proto public exit():Void
     * @return nulltype
     */
    public function exit() {
        
    }
    
    /** 
     * Sends buffered HTML output immediately. 
     * 
     * @return integer - Upon successful completion, zero is returned. Otherwise, a value of non-zero is returned. 
     * @proto public flush():Int
     */
    public function flush() {
        flush();
        return 0;
    }
    
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
    public function getBuffer() {
        return (bool) $this->Buffer;
    }
    
    /** 
     * Retrieves the value for the CacheControl property. 
     * 
     * @return string
     * @proto public getCacheControl():String
     */
    public function getCacheControl() {
        return (string) $this->CacheControl;
    }
    
    /** 
     * Retrieves the value for the CharSet property. 
     * 
     * @return string
     * @proto public getCharSet():String
     */
    public function getCharSet() {
        return (string) $this->CharSet;
    }
    
    /** 
     * Retrieves the value of the ContentType property. 
     * 
     * @return string
     * @proto public getContentType():String
     */
    public function getContentType() {
        return (string) $this->ContentType;
    }
    
    /**	
     * Retrieves the value of the Expires property. 
     * 
     * @return integer
     * @proto public getExpires():Int
     */
    public function getExpires() {
        return (int) $this->Expires;
    }
    
    /** 
     * Retrieves the value of the ExpiresAbsolute property. 
     * 
     * @return string
     * @proto public getExpiresAbsolute():String
     */
    public function getExpiresAbsolute() {
        return (string) $this->ExpiresAbsolute;
    }
    
    /** 
     * Retrieves the value of the Status property. 
     * 
     * @return string
     * @proto public getStatus():String
     */
    public function getStatus() {
        return (string) $this->Status;
    }
    
    /** 
     * PICS has been superseded by the Protocol for Web Description Resources (POWDER)
     * @deprecated
     */
    public function PICS($headerValue) {
        
    }
    
    /** 
     * Causes the browser to attempt to connect to a different URL. 
     * 
     * @param string $url
     * @return integer
     * @proto public redirect(url:String):Int
     */
    public function redirect($url) {
        
    }
    
    /** 
     * Sets the value of the Buffer property. 
     * 
     * @param boolean $buffering
     * @return integer
     * @proto public setBuffer(buffering:Bool):Int
     */
    public function setBuffer($buffering) {
        $this->Buffer = (bool) $buffering;
        return 0;
    }

    /** 
     * Sets the value of the CacheControl property. 
     * 
     * @param string $cacheControl
     * @return integer
     * @proto public setCacheControl(cacheControl:String):Int
     */
    public function setCacheControl($cacheControl) {
        this->CacheControl = (string) $cacheControl;
        return 0;
    }
    
    /** 
     * Sets the value of the Charset property. 
     * 
     * @param string $charSet
     * @return integer
     * @proto public setCharSet(charSet:String):Int
     */
    public function setCharSet($charSet) {
        $this->Charset = (string) $charSet;
        return 0;
    }
    
    /**	
     * Sets the value of the ContentType property. 
     * 
     * @param string $contentType
     * @return integer
     * @proto public setContentType(contentType:String):Int
     */
    public function setContentType($contentType) {
        $this->ContentType = (string) $contentType;
        return 0;
    }
    
    /** 
     * Sets the value of the Expires property. 
     * 
     * @param integer expiresMinutes
     * @return integer
     * @proto public setExpires(expiresMinutes:Int):Int
     */
    public function setExpires($expiresMinutes) {
        $this->Expires = (int) $expiresMinutes;
        return 0;
    }
    
    /** 
     * Sets the value of the ExpiresAbsolute property. 
     * 
     * @param string $expiresAbsolute
     * @return integer
     * @proto public setExpiresAbsolute(expiresAbsolute:String):Int
     */
    public function setExpiresAbsolute($expiresAbsolute) {
        $this->ExpiresAbsolute = (string) $expiresAbsolute;
        return 0;
    }
    
    /** 
     * Sets the value of the Status property. 
     * 
     * @param string $status
     * @return integer
     * @proto public setStatus(status:String):Int
     */
    public function setStatus($status) {
        $this->Status = (string) $status;
        return 0;
    }
    
    /** 
     * Set the title of an HTML page.
     * 
     * @deprecated Not needed in PHP version.
     * @param string $title
     * @return nulltype
     * @proto public title(title:String):Void
     */
    public function title($title) {
        
    }
}
