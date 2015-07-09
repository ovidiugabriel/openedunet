<?php

/**
 * This is a port of the class described at:
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CCookie.html
 */
class CCookie {
    //
    // Member functions of CCookie class set or get the name and value of a cookie, as well as optional attributes. 
    //
    // https://msdn.microsoft.com/en-us/library/system.net.cookie_properties%28v=vs.110%29.aspx
    //
    
    /** Adds a new port into the portlist of the cookie. For version 1 only */
    public function addPort($portNum) {}
    
    /** Retrieve the Comment attribute of the cookie. For version 1 only */
    public function getComment(){}
    
    /** Retrieve the CommentURL attribute of the cookie. For version 1 only */
    public function getCommentURL(){}
    
    /** Retrieve the Discard attribute of the cookie. For version 1 only */
    public function getDiscard(){}
    
    /** Retrieve the Domain attribute of the cookie. */
    public function getDomain(){}
    
    /**	Retrieve maximum age of the cookie. */
    public function getMaxAge(){}
    
    /** Retrieve the name of the cookie. */
    public function getName(){}
    
    /** Retrieve the path on the server to which browser returns the cookie. */
    public function getPath(){}
    
    /**	Retrieve all ports in the portlist of the cookie. For version 1 only */
    public function getPorts(){}
    
    /** Determine if the browser is sending the cookie only over a secure protocol */
    public function getSecure(){}
    
    /** Retrieve the value of the cookie. */
    public function getValue(){}
    
    /** Retrieve the version of the protocol the cookie complies with. */
    public function getVersion(){}
    
    /** Set the Comment attribute of the cookie. For version 1 only */
    public function setComment($comment){}
    
    /** Set the CommentURL attribute of the cookie. For version 1 only */
    public function setCommentURL($comment){}
    
    /** Set the Discard attribute of the cookie. For version 1 only */
    public function setDiscard($discard){}
    
    /** Set the Domain attribute of the cookie. */
    public function setDomain($domain){}
    
    /**	Set maximum age of the cookie. */
    public function setMaxAge($maxAge){}
    
    /** Set the name of the cookie. */
    public function setName($name){}
    
    /** Set the path on the server to which browser returns the cookie. */
    public function setPath($path){}
    
    /**	Set the Secure attribute of the cookie. */
    public function setSecure($secure){}
    
    /** Set the value of the cookie. */
    public function setValue($value){}
    
    /** Set the version of the protocol the cookie complies with. */
    public function setVersion($version){}
}
