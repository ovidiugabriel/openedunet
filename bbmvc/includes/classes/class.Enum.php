<?php

class Enum {
    public function values() {
        return Reflect::getReflectionClass($this)->getConstants();
    }
    
    public function valueOf($name) {
        $values = $this->values();
        return $values[$name];
    }
}
