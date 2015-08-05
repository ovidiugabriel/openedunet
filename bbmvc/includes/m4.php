<?php

/**
 * @param string $def
 * @param mixed $yes
 * @param mixed $no
 * @return mixed
 */
function ifdef($def, $yes, $no, $fn = null) {
    $val = defined($def) ? $yes : $no;
    if (null !== $fn) {
        $val = $fn($val);
    }
    return $val;
}

/** 
 * @param mixed $s1
 * @param mixed $s2
 * @param mixed $eq
 * @param mixed $neq
 */
function ifeqelse($s1, $s2, $eq, $neq, $fn = null) {
    $val = ($s1 == $s2) ? $eq : $neq;
    if (null !== $fn) {
        $val = $fn($val);
    }
    return $val;
}
