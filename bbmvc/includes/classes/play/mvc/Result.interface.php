<?php

/** 
 * @package play.mvc
 * @uuid {385949d5-87a8-4612-b209-ac67210f1866}
 */
interface play_mvc_Result {
    /** 
     * Extracts the Charset of this Result value.
     * 
     * @proto public charset():String
     */
    public function charset();
    
    /** 
     * Extracts the Content-Type of this Result value.
     * 
     * @proto public contentType():String
     */
    public function contentType();
    
    /** 
     * Extracts a Cookie value from this Result value
     * 
     * @proto public cookie(name:String):play.mvc.http.Cookie
     */
    public function cookie($name);
    
    /** 
     * Extracts the Cookies (an iterator) from this result value.
     * 
     * @proto public cookies():play.mvc.http.Cookies
     */
    public function cookies();
    
    /** 
     * Extracts the Flash values of this Result value.
     * 
     * @proto public flash():play.mvc.http.Flash
     */
    public function flash();
    
    /**
     * Extracts an Header value of this Result value.
     * 
     * @proto public header(header:String):String
     */
    public function header($header);
    
    /** 
     * Extracts all Headers of this Result value.
     * 
     * @return array
     * @proto public headers():Dynamic
     */
    public function headers();
    
    /** 
     * Extracts the Location header of this Result value if this Result is a Redirect.
     * 
     * @proto public redirectLocation():String
     */
    public function redirectLocation();

    /** 
     * Extracts the Session of this Result value.
     * 
     * @proto public session():play.mvc.http.Session
     */
    public function session();

    /**
     * Extracts the Status code of this Result value.
     * 
     * @proto public status():Int
     */
    public function status();
}
