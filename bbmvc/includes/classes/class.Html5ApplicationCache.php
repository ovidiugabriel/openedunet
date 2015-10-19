<?php

/* * *************************************************************************
 *  Copyright (c) 2006, BMR Soft srl, ICE Control srl
 *  All rights reserved.
 *
 *  Redistribution and use in source and binary forms, with or without
 *  modification, are permitted provided that the following conditions are met:
 *
 *      # Redistributions of source code must retain the above copyright
 *        notice, this list of conditions and the following disclaimer.
 *          
 *      # Redistributions in binary form must reproduce the above copyright
 *        notice, this list of conditions and the following disclaimer in the
 *        documentation and/or other materials provided with the distribution.
 *          
 *      # Neither the name of the BMR Soft srl, ICE Control srl nor the
 *        names of its contributors may be used to endorse or promote products
 *        derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL BMR Soft srl, or ICE Control srl BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * ************************************************************************* */

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
    
    public function dump() {
        println('CACHE MANIFEST');
        println('# ' . $this->version);

        println('NETWORK:');
        foreach ($this->network as $file) {
            println($file);
        }

        println('FALLBACK:');
        foreach ($this->fallback as $file) {
            println($file);
        }
    }
}

// EOF