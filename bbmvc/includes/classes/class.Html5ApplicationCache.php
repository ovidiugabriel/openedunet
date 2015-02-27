<?php

/**
 * HTML5 Application Cache file generator
 */
class Html5ApplicationCache {
}

class CacheManifest {
    // Files listed under this header will be cached after they are downloaded for the first time
    private $cache_manifest = array();
  
    // Files listed under this header require a connection to the server, and will never be cached
    private $network        = array();
  
    // Files listed under this header specifies fallback pages if a page is inaccessible
    private $fallback       = array();
    
    public function print() {
    }
}