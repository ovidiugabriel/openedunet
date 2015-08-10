<?php

class KeyType {
    private $type;
    public function __construct($type) {
        $this->type = $type;
    }
    public function __toString() {
        return $type;
    }
}
