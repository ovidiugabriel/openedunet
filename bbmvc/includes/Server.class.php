<?php

/** 
 * This is a port of the class described at:
 * https://www.softintegration.com/docs/ch/cgi/chcgi/CServer.html
 */
class Server {
    /** 
     * Applies HTML encoding to the specified string.
     * 
     * @proto public HTMLEncode(in:String):String  
     */
    public function HTMLEncode($in) {}

    /** 
     * Maps the specified relative or virtual path to the corresponding physical directory on the server.
     * 
     * @proto public mapPath(in:String):String 
     */
    public function mapPath($in) {}

    /**
     * Applies URL encoding rules, including escape characters, to the specified string.
     * 
     * @proto public URLEncode(in:String):String 
     */
    public function URLEncode($in) {}

}
