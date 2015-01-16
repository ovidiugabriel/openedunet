<?php

function Cache() {
    return Cache::instance();
}

class Cache {

    private $is_enabled = false;
    private $memcache   = null;

    static public function instance() {
        static $instance = null;
        if (null == $instance) {
            $class    = __CLASS__;
            $instance = new $class();
        }
        return $instance;
    }

    public function memcache() {
        return $this->memcache;
    }

    private function __construct()
    {
        if (!defined('MEMCACHED_HOST') || !defined('MEMCACHED_PORT')) {
            throw new Exception("MEMCACHED_HOST:MEMCACHED_PORT are not defined.", 1);    		
        }

        if (class_exists('Memcached')) {
            $this->memcache  = new Memcached();

            $servers         = $this->memcache->getServerList();
            // TODO: change this when working with multiple servers
            $cache_available = (0 == count($servers)) ? $this->memcache->addServer(MEMCACHED_HOST, MEMCACHED_PORT) : true;
            $stats           = $this->memcache->getStats();

            if ($cache_available) {
                $index = MEMCACHED_HOST . ':' . MEMCACHED_PORT;
                if (isset($stats[$index]) && $stats[$index]) {
                    $this->is_enabled = true;
                }
            }
        } else {
        	throw new Exception("Memcached not installed", 1);
        	
        }
    }

    public function get($key, $callback = null) {
        $res = false; // for case when cache is not enabled
        if ($this->is_enabled) {
            echo "memcache.get($key) \n";
            $res = $this->memcache->get($key);
        } else {
            echo "Cache is not enabled \n";
        }

        if ((false === $res) || (null === $res)) {
            if (!is_callable($callback)) {
                return null;
            }
            $res = $callback();
            if (!$this->memcache->set($key, $res)) {
                throw new Exception("memcache.set($key) FAILED: " . $this->memcache->getResultMessage(), 1);
                
            }
            echo "Key set \n";
        }
        return $res;
    }
}