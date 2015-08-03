<?php

class Enum {
    static public function values($class_name) {
        $reflection = new ReflectionClass($class_name);
        return $reflection->getConstants();
    }
}
