<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       Benchmark.php                                               */
/*                                                                           */
/*  Created on:  17.08.2015 at 12:32:23                                      */
/*  Email:       ovidiugabriel@gmail.com                                     */
/*  Copyright:   (C) 2015 ICE Control srl. All Rights Reserved.              */
/*                                                                           */
/*  $Id$                                                                     */
/*                                                                           */
/* ************************************************************************* */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/* 17.08.2015           Added constructor to Benchmark class                 */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

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
     * @param float $start
     */
    public function __construct($start = null) {
        if (null !== $start) {
            $this->start = $start;
        }
    }

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
