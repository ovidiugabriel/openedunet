<?php

class Enum {
    public function values() {
        $class_name = get_class($this);
        $reflection = new ReflectionClass($class_name);
        return $reflection->getConstants();
    }
}
