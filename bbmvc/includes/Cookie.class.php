<?php

/**
 * This is a port of the class described at:
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CCookie.html
 * 
 * [RFC 2616 - HTTP/1.1 Hypertext Transfer Protocol](https://www.ietf.org/rfc/rfc2616.txt)
 * [RFC 2109 - HTTP State Management Mechanism](https://www.ietf.org/rfc/rfc2109.txt)
 * [Key Differences between HTTP/1.0 and HTTP/1.1](http://www8.org/w8-papers/5c-protocols/key/key.html)
 */
class Cookie {
    //
    // Member functions of CCookie class set or get the name and value of a cookie, as well as optional attributes. 
    //
    // https://msdn.microsoft.com/en-us/library/system.net.cookie_properties%28v=vs.110%29.aspx
    //
    
    // According to: RFC 2109, Page 4:
    /* 

    NAME=VALUE
      Required.  The name of the state information ("cookie") is NAME,
      and its value is VALUE.  NAMEs that begin with $ are reserved for
      other uses and must not be used by applications.
      
      The VALUE is opaque to the user agent and may be anything the
      origin server chooses to send, possibly in a server-selected
      printable ASCII encoding.  "Opaque" implies that the content is of
      interest and relevance only to the origin server.  The content
      may, in fact, be readable by anyone that examines the Set-Cookie
      header.

    Domain=domain
      Optional.  The Domain attribute specifies the domain for which the
      cookie is valid.  An explicitly specified domain must always start
      with a dot.

    Max-Age=delta-seconds
      Optional.  The Max-Age attribute defines the lifetime of the
      cookie, in seconds.  The delta-seconds value is a decimal non-
      negative integer.  After delta-seconds seconds elapse, the client
      should discard the cookie.  A value of zero means the cookie
      should be discarded immediately.

    Path=path
      Optional.  The Path attribute specifies the subset of URLs to
      which this cookie applies.

    Secure
      Optional.  The Secure attribute (with no value) directs the user
      agent to use only (unspecified) secure means to contact the origin
      server whenever it sends back this cookie.

      The user agent (possibly under the user's control) may determine
      what level of security it considers appropriate for "secure"
      cookies.  The Secure attribute should be considered security
      advice from the server to the user agent, indicating that it is in
      the session's interest to protect the cookie contents.

    */

    /**
     * The Domain attribute specifies the domain for which the
     * cookie is valid.  An explicitly specified domain must always start
     * with a dot.
     * 
     * @var string (Optional) 
     */
    private $Domain;
    
    /** 
     * The Max-Age attribute defines the lifetime of the
     * cookie, in seconds.  The delta-seconds value is a decimal non-
     * negative integer.  After delta-seconds seconds elapse, the client
     * should discard the cookie.  A value of zero means the cookie
     * should be discarded immediately.
     * 
     * @var int 
     */
    private $MaxAge;
    
    /** 
     * @var string (required) 
     */
    private $Name;
    
    /**
     * The Path attribute specifies the subset of URLs to
     * which this cookie applies.
     * 
     * @var string 
     */
    private $Path;
    
    /** 
     * The Secure attribute (with no value) directs the user
     * agent to use only (unspecified) secure means to contact the origin
     * server whenever it sends back this cookie.
     * The user agent (possibly under the user's control) may determine
     * what level of security it considers appropriate for "secure"
     * cookies.  The Secure attribute should be considered security
     * advice from the server to the user agent, indicating that it is in
     * the session's interest to protect the cookie contents.
     * 
     * @var bool 
     */
    private $Secure;
    
    /** 
     * @var string (required) 
     */
    private $Value;
    
    /** 
     * Retrieve the Domain attribute of the cookie. 
     * 
     * @proto public getDomain():php.NativeString
     */
    public function getDomain() {
        return (string) $this->Domain;
    }
    
    /**	
     * Retrieve maximum age of the cookie. 
     * 
     * @proto public getMaxAge():Int
     */
    public function getMaxAge() {
        return (int) $this->MaxAge;
    }
    
    /** 
     * Retrieve the name of the cookie. 
     * 
     * @proto public getName():php.NativeString
     */
    public function getName() {
        return (string) $this->Name;
    }
    
    /** 
     * Retrieve the path on the server to which browser returns the cookie. 
     * 
     * @proto public getPath():php.NativeString
     */
    public function getPath() {
        return (string) $this->Path;
    }
    
    /** 
     * Determine if the browser is sending the cookie only over a secure protocol 
     * 
     * @proto public getSecure():Bool
     */
    public function getSecure() {
        return (bool) $this->Secure;
    }
    
    /** 
     * Retrieve the value of the cookie. 
     * 
     * @proto public getValue():php.NativeString
     */
    public function getValue() {
        return (string) $this->Value;
    }
    
    /** 
     * Set the Domain attribute of the cookie. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @proto public setDomain(domain:String):Int
     */
    public function setDomain($domain) {
        $this->Domain = (string) $domain;
    }
    
    /**
     * Set maximum age of the cookie. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @proto public setMaxAge(maxAge:Int):Int
     */
    public function setMaxAge($maxAge) {
        $this->MaxAge = (int) $maxAge;
    }
    
    /** 
     * Set the name of the cookie. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @proto public setName(name:String):Int
     */
    public function setName($name) {
        $this->Name = (string) $name;
    }
    
    /** 
     * Set the path on the server to which browser returns the cookie. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @proto public setPath(path:String):Int
     */
    public function setPath($path) {
        $this->Path = (string) $path;
    }
    
    /**	
     * Set the Secure attribute of the cookie. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @proto public setSecure(secure:Bool):Int
     */
    public function setSecure($secure) {
        $this->Secure = (bool) $secure;
    }
    
    /** 
     * Set the value of the cookie. 
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     * 
     * @proto public setValue(value:String):Void
     */
    public function setValue($value) {
        $this->Value = (string) $value;
    }
}
