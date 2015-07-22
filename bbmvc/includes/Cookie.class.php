<?php

/**
 * Cookie class.
 *
 * This is a port of :
 * [Soft Integration Ch CGI Cookie Class](https://www.softintegration.com/docs/ch/cgi/chcgi/CCookie.html)
 *
 * Other information:
 * - [RFC 2616 - HTTP/1.1 Hypertext Transfer Protocol](https://www.ietf.org/rfc/rfc2616.txt)
 * - [RFC 2109 - HTTP State Management Mechanism](https://www.ietf.org/rfc/rfc2109.txt)
 * - [Key Differences between HTTP/1.0 and HTTP/1.1](http://www8.org/w8-papers/5c-protocols/key/key.html)
 *
 * @access public
 * @package barebone
 */
class Cookie {
    //
    // Member functions of CCookie class set or get the name and value of a cookie, as well as optional attributes.
    //
    // https://msdn.microsoft.com/en-us/library/system.net.cookie_properties%28v=vs.110%29.aspx
    //


    /**
     * Optional
     *
     * The Domain attribute specifies the domain for which the
     * cookie is valid.  An explicitly specified domain must always start
     * with a dot.
     *
     * @var string (Optional)
     */
    private $Domain;

    /**
     * Optional (Max-Age=delta-seconds).
     *
     * The Max-Age attribute defines the lifetime of the
     * cookie, in seconds.  The delta-seconds value is a decimal non-
     * negative integer.  After delta-seconds seconds elapse, the client
     * should discard the cookie.  A value of zero means the cookie
     * should be discarded immediately.
     *
     * @var integer
     */
    private $MaxAge;

    /**
     * Required.
     *
     * @var string (required)
     */
    private $Name;

    /**
     * Optional.
     *
     * The Path attribute specifies the subset of URLs to
     * which this cookie applies.
     *
     * @var string
     */
    private $Path;

    /**
     * Optional.
     *
     * The Secure attribute (with no value) directs the user
     * agent to use only (unspecified) secure means to contact the origin
     * server whenever it sends back this cookie.
     *
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
     * Required.
     *
     * @var string (required)
     */
    private $Value;

    /**
     * Retrieve the Domain attribute of the cookie.
     *
     * @return string
     * @proto public getDomain():php.NativeString
     */
    public function getDomain() {
        return (string) $this->Domain;
    }

    /**
     * Retrieve maximum age of the cookie.
     *
     * @return integer
     * @proto public getMaxAge():Int
     */
    public function getMaxAge() {
        return (int) $this->MaxAge;
    }

    /**
     * Retrieve the name of the cookie.
     *
     * @return string
     * @proto public getName():php.NativeString
     */
    public function getName() {
        return (string) $this->Name;
    }

    /**
     * Retrieve the path on the server to which browser returns the cookie.
     *
     * @return string
     * @proto public getPath():php.NativeString
     */
    public function getPath() {
        return (string) $this->Path;
    }

    /**
     * Determine if the browser is sending the cookie only over a secure protocol
     *
     * @return boolean
     * @proto public getSecure():Bool
     */
    public function getSecure() {
        return (bool) $this->Secure;
    }

    /**
     * Retrieve the value of the cookie.
     *
     * @return string
     * @proto public getValue():php.NativeString
     */
    public function getValue() {
        return (string) $this->Value;
    }

    /**
     * Set the Domain attribute of the cookie.
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     *
     * @param string $domain
     * @return void
     * @proto public setDomain(domain:String):Void
     */
    public function setDomain($domain) {
        $this->Domain = (string) $domain;
    }

    /**
     * Set maximum age of the cookie.
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     *
     * @param integer $maxAge
     * @return void
     * @proto public setMaxAge(maxAge:Int):Void
     */
    public function setMaxAge($maxAge) {
        $this->MaxAge = (int) $maxAge;
    }

    /**
     * Set the name of the cookie.
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     *
     * @param string $name
     * @return void
     * @proto public setName(name:String):Void
     */
    public function setName($name) {
        $this->Name = (string) $name;
    }

    /**
     * Set the path on the server to which browser returns the cookie.
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     *
     * @param string $path
     * @return void
     * @proto public setPath(path:String):Void
     */
    public function setPath($path) {
        $this->Path = (string) $path;
    }

    /**
     * Set the Secure attribute of the cookie.
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     *
     * @param boolean $secure
     * @return void
     * @proto public setSecure(secure:Bool):Void
     */
    public function setSecure($secure) {
        $this->Secure = (bool) $secure;
    }

    /**
     * Set the value of the cookie.
     * There is no reason to have a return code. Runtime errors must be handled by exception handling.
     *
     * @param string $value
     * @return void
     * @proto public setValue(value:String):Void
     */
    public function setValue($value) {
        $this->Value = (string) $value;
    }
}
