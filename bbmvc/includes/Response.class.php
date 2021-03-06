<?php

/**
 * This is a port of class described at:
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CResponse.html
 */
class Response {
    // Member functions of CResponse class implement the methods of the Response object.

    // RFC 2616 - Section 14. Header Field Definitions
    // http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
    // Headers:
    //      - https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers
    //      - https://en.wikipedia.org/wiki/List_of_HTTP_header_fields

    /**
     * Do not replace existing header.
     *
     * Used as 3rd parameter for Dispatcher::header()
     */
    const HEADER_REPLACE_NO  = false;

    /**
     * Replace existing header.
     *
     * Used as 3rd parameter for Dispatcher::header()
     */
    const HEADER_REPLACE_YES = true;

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
     * @param boolean $http_only
     * @return integer
     * @proto public addCookie(cookie:Cookie):Bool
     */
    public function addCookie(Cookie $cookie, $http_only = false) {
        $this->Expires = $cookie->getExpires();
        return setcookie($cookie->getName(),
            $cookie->getValue(),
            $this->Expires,  // instead of MaxAge
            $cookie->getPath(),
            $cookie->getDomain(),
            $cookie->getSecure(),
            $http_only
        );
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
     * @param string $name header name
     * @param string $value header value
     * @param boolean $replace whether to replace the existing header
     * @param integer $http_response_code the response code
     * @return void
     *
     * @proto public addHeader(name:String, value:String):Void
     */
    public function addHeader($name, $value, $replace = false, $http_response_code = 0) {
        header($name . ': ' . $value, $replace, $http_response_code);
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
     * RFC 2616 - 14.9 Cache-Control
     *
     * @return string
     * @proto public getCacheControl():php.NativeString
     */
    public function getCacheControl() {
        return (string) $this->CacheControl;
    }

    /**
     * Retrieves the value for the CharSet property.
     * RFC 2616 - 14.17 Content-Type
     *
     * @return string
     * @proto public getCharSet():php.NativeString
     */
    public function getCharSet() {
        return (string) $this->CharSet;
    }

    /**
     * Retrieves the value of the ContentType property.
     * RFC 2616 - 14.17 Content-Type
     *
     * @return string
     * @proto public getContentType():php.NativeString
     */
    public function getContentType() {
        return (string) $this->ContentType;
    }

    /**
     * Retrieves the value of the Expires property.
     * RFC 2616 - 14.21 Expires
     *
     * @return integer
     * @proto public getExpires():Int
     */
    public function getExpires() {
        return (int) $this->Expires;
    }

    /**
     * Retrieves the value of the ExpiresAbsolute property.
     * RFC 2616 - 14.21 Expires
     * The format is an absolute date and time as defined by HTTP-date in section 3.3.1;
     * it MUST be in RFC 1123 date format:
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
        // TODO: This was
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
     * RFC 2616 - 14.9 Cache-Control
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
     *  RFC 2616 - 14.17 Content-Type
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
     * RFC 2616 - 14.17 Content-Type
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
     * RFC 2616 - 14.21 Expires
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
     * RFC 2616 - 14.21 Expires
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
