<?php

// Take a look on ServerParams class
class Environment {
    /** 
     * @return boolean
     * @proto static public isShell():Bool
     */
    static public function isShell() {
        return false;
    }
    
    /**
     * @return boolean
     * @proto static public isWeb():Bool
     */
    static public function isWeb() {
        return false;
    }
}
