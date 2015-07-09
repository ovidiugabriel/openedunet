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
    
    private $Comment;
    private $CommentURL;
    private $Discard;
    private $Domain;
    private $MaxAge;
    private $Name;
    private $Path;
    private $portlist = array();
    private $Secure;
    private $Value;
    private $Version;

    /** 
     * Adds a new port into the portlist of the cookie. For version 1 only .
     * 
     * @param integer $portNum  indicates the new port to be added
     * @proto public addPort(portNum:Int):Int
     */
    public function addPort($portNum) {
        
    }
    
    /** 
     * Retrieve the Comment attribute of the cookie. For version 1 only .
     * 
     * @proto public getComment():String
     */
    public function getComment() {
        return (string) $this->Comment;
    }
    
    /** 
     * Retrieve the CommentURL attribute of the cookie. For version 1 only .
     * 
     * @proto public getCommentURL():String
     */
    public function getCommentURL() {
        return (string) $this->CommentURL;
    }
    
    /** 
     * Retrieve the Discard attribute of the cookie. For version 1 only .
     * 
     * @proto public getDiscard():Bool
     */
    public function getDiscard() {
        return (bool) $this->Discard;
    }
    
    /** 
     * Retrieve the Domain attribute of the cookie. 
     * 
     * @proto public getDomain():String
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
     * @proto public getName():String
     */
    public function getName() {
        return (string) $this->Name;
    }
    
    /** 
     * Retrieve the path on the server to which browser returns the cookie. 
     * 
     * @proto public getPath():String
     */
    public function getPath() {
        return (string) $this->Path;
    }
    
    /**	
     * Retrieve all ports in the portlist of the cookie. For version 1 only .
     * 
     * @return array containing all ports in the portlist
     * @proto public getPorts():Array
     */
    public function getPorts() {
        return (array) $this->portlist;
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
     * @proto public getValue():String
     */
    public function getValue() {
        return (string) $this->Value;
    }
    
    /** 
     * Retrieve the version of the protocol the cookie complies with. 
     * 
     * @proto public getVersion():Int
     */
    public function getVersion() {
        return (int) $this->Version;
    }
    
    /** 
     * Set the Comment attribute of the cookie. For version 1 only .
     * 
     * @proto public setComment(comment:String):Int
     */
    public function setComment($comment) {
        $this->Comment = (string) $comment;
        return 0;
    }
    
    /** 
     * Set the CommentURL attribute of the cookie. For version 1 only .
     * 
     * @proto public setCommentURL(comment:String):Int
     */
    public function setCommentURL($comment) {
        $this->CommentURL = (string) $comment;
        return 0;
    }
    
    /** 
     * Set the Discard attribute of the cookie. For version 1 only .
     * 
     * @proto public setDiscard(discard:Bool):Int
     */
    public function setDiscard($discard) {
        $this->Discard = (bool) $discard;
        return 0;
    }
    
    /** 
     * Set the Domain attribute of the cookie. 
     * 
     * @proto public setDomain(domain:String):Int
     */
    public function setDomain($domain) {
        $this->Domain = (string) $domain;
        return 0;
    }
    
    /**
     * Set maximum age of the cookie. 
     * 
     * @proto public setMaxAge(maxAge:Int):Int
     */
    public function setMaxAge($maxAge) {
        $this->MaxAge = (int) $maxAge;
        return 0;
    }
    
    /** 
     * Set the name of the cookie. 
     * 
     * @proto public setName(name:String):Int
     */
    public function setName($name) {
        $this->Name = (string) $name;
        return 0;
    }
    
    /** 
     * Set the path on the server to which browser returns the cookie. 
     * 
     * @proto public setPath(path:String):Int
     */
    public function setPath($path) {
        $this->Path = (string) $path;
        return 0;
    }
    
    /**	
     * Set the Secure attribute of the cookie. 
     * 
     * @proto public setSecure(secure:Bool):Int
     */
    public function setSecure($secure) {
        $this->Secure = (bool) $secure;
        return 0;
    }
    
    /** 
     * Set the value of the cookie. 
     * 
     * @proto public setValue(value:String):Int
     */
    public function setValue($value) {
        $this->Value = (string) $value;
        return 0;
    }
    
    /** 
     * Set the version of the protocol the cookie complies with. 
     * 
     * @proto public setVersion(version:Int):Int
     */
    public function setVersion($version) {
        $this->Version = (int) $version;
        return 0;
    }
}
