<?php

class Benchmark {
    /**
     *
     * @var float
     */
    private $start;

    /**
     *
     * @var float
     */
    private $stop;
    
    /**
     * Returns the peak of memory, in mega-bytes, that's been allocated to your
     * PHP script.
     *
     * @param boolean $realUsage
     * @return float
     */
    public static function getMemoryUsage($realUsage = true) {
        return (float) sprintf('%.2f', memory_get_peak_usage((bool) $realUsage) / 1024 / 1024);
    }
    
    public function start() {
        $this->start = microtime(true);
    }
    
    /** 
     * @return float
     */
    public function stop() {
        $this->stop = microtime(true);
        return (float) sprintf('%.2f', $this->stop - $this->start);
    }
}
