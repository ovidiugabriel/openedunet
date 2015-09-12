<?php

/** 
 * This is a port of the class described at:
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CServer.html
 */
class Server {
    /** 
     * Applies HTML encoding to the specified string.
     * 
     * @proto public htmlEncode(in:String):String  
     */
    public function htmlEncode($in) {}

    /** 
     * Maps the specified relative or virtual path to the corresponding physical directory on the server.
     * 
     * @proto public mapPath(in:String):String 
     */
    public function mapPath($in) {}

    /**
     * Applies URL encoding rules, including escape characters, to the specified string.
     * 
     * @proto public urlEncode(in:String):String 
     */
    public function urlEncode($in) {}

}
