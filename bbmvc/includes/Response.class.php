<?php

/**
 * This is a port of class described at: 
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CResponse.html
 */
class Response {
    // Member functions of CResponse class implement the methods of the Response object.
    
    /** @var bool */
    private $Buffer;
    
    /** @var string */
    private $CacheControl;
    
    /** @var string */
    private $CharSet;
    
    /** @var string */
    private $ContentType;
    
    /** @var int */
    private $Expires;
    
    /** @var string */
    private $ExpiresAbsolute;
    
    /** @var string */
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
        $this->Expires = $cookie->getExpires();
        $result = setcookie($cookie->getName(),
            $cookie->getValue(),
            $this->Expires,  // instead of MaxAge
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
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @param array $headers
     * @return integer - Upon successful completion, zero is returned. Otherwise, a value of non-zero is returned. 
     * @proto public addHeader(headers:StringMap):Void
     */
    public function addHeader($headers) {
        foreach ($headers as $name => $value) {
            header($name . ': ' . $value, false);
        }
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
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * @proto public flush():Void
     */
    public function flush() {
        flush();
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
     * @proto public getCacheControl():php.NativeString
     */
    public function getCacheControl() {
        return (string) $this->CacheControl;
    }
    
    /** 
     * Retrieves the value for the CharSet property. 
     * 
     * @return string
     * @proto public getCharSet():php.NativeString
     */
    public function getCharSet() {
        return (string) $this->CharSet;
    }
    
    /** 
     * Retrieves the value of the ContentType property. 
     * 
     * @return string
     * @proto public getContentType():php.NativeString
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
     * @proto public getExpiresAbsolute():php.NativeString
     */
    public function getExpiresAbsolute() {
        return (string) $this->ExpiresAbsolute;
    }
    
    /** 
     * Retrieves the value of the Status property. 
     * 
     * @return string
     * @proto public getStatus():php.NativeString
     */
    public function getStatus() {
        return (string) $this->Status;
    }

    /** 
     * Causes the browser to attempt to connect to a different URL. 
     * 
     * @param string $url
     * @return integer
     * @proto public redirect(url:String):Void
     */
    public function redirect($url) {
        die;
    }
    
    /** 
     * Sets the value of the Buffer property. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @param boolean $buffering
     * @return integer
     * @proto public setBuffer(buffering:Bool):Void
     */
    public function setBuffer($buffering) {
        $this->Buffer = (bool) $buffering;
    }

    /** 
     * Sets the value of the CacheControl property. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @param string $cacheControl
     * @return integer
     * @proto public setCacheControl(cacheControl:String):Void
     */
    public function setCacheControl($cacheControl) {
        $this->CacheControl = (string) $cacheControl;
    }
    
    /** 
     * Sets the value of the Charset property. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @param string $charSet
     * @return integer
     * @proto public setCharSet(charSet:String):Void
     */
    public function setCharSet($charSet) {
        $this->Charset = (string) $charSet;
    }
    
    /**	
     * Sets the value of the ContentType property.
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @param string $contentType
     * @return integer
     * @proto public setContentType(contentType:String):Void
     */
    public function setContentType($contentType) {
        $this->ContentType = (string) $contentType;
    }
    
    /** 
     * Sets the value of the Expires property. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @param integer expiresMinutes
     * @return integer
     * @proto public setExpires(expiresMinutes:Int):Void
     */
    public function setExpires($expiresMinutes) {
        $this->Expires = (int) $expiresMinutes;
    }
    
    /** 
     * Sets the value of the ExpiresAbsolute property. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @param string $expiresAbsolute
     * @return integer
     * @proto public setExpiresAbsolute(expiresAbsolute:String):Void
     */
    public function setExpiresAbsolute($expiresAbsolute) {
        $this->ExpiresAbsolute = (string) $expiresAbsolute;
    }
    
    /** 
     * Sets the value of the Status property. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @param string $status
     * @return integer
     * @proto public setStatus(status:String):Void
     */
    public function setStatus($status) {
        $this->Status = (string) $status;
    }
}
