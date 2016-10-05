<?php

class Iteration {
    private $index;
    private $total;
    
    public function __construct($index, $total) {
        $this->index = (int) $index;
        $this->total = (int) $total;
    }
    
    public function index() {
        return $this->index;
    }

    public function iteration() {
        return $this->index + 1;
    }
    
    public function first() {
        return 0 == $this->index;
    }
    
    public function last() {
        return ($this->total - 1) == $this->index;
    }
    
    public function show() {
        return $this->total > 0;
    }
    
    public function total() {
        return $this->total;
    }
}
