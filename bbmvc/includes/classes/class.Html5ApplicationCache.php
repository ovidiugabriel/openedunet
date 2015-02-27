<?php

/**
 * HTML5 Application Cache file generator
 */
class Html5ApplicationCache {
}

/** 
 * Once a file is cached, the browser will continue to show the cached version, 
 * even if you change the file on the server. 
 *
 * To ensure the browser updates the cache, you need to change the manifest file.
 * This is done using CacheManifest::version member.
 */
class CacheManifest {
    /** 
     * A version string that must be updated each time the cache contents changes 
     * @var string
     */
    private $version;

    /**
     * Files listed under this header will be cached after they are downloaded for the first time
     * @var array
     */
    private $cache_manifest = array();
  
    /**
     * Files listed under this header require a connection to the server, and will never be cached
     * @var array
     */
    private $network        = array();
  
    /**
     * Files listed under this header specifies fallback pages if a page is inaccessible
     * @var array
     */
    private $fallback       = array();
    
    public function print() {
    }
}

// EOF