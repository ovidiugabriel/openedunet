<?php

//
// This function is so common that I expect it to be already defined somewhere
// But if it is not, let's define it here.
//
if (!function_exists('identity')) {
    function identity($x) {
        return $x;
    }
}

/**
 *  When you feel that doing this:
 * 
 *      if (defined('CONSTANT_NAME')) {
 *          $val = 'yes';
 *      } else {
 *          $val = 'no';
 *      }
 * 
 * Has no added value, and you understand that this is nothing but a 
 * basic boolean expression:
 * 
 *      $val = defined('CONSTANT_NAME') ? 'yes' : 'no';
 * 
 * But if for some deceptive reason you want to avoid ternary operator, 
 * (or you are not allowed to use it), then just do it this way:
 * 
 *     $val = ifdef('CONSTANT_NAME', 'yes', 'no');
 * 
 * @param string $def
 * @param mixed $yes
 * @param mixed $no
 * @param callable $fn
 * @return mixed
 */
function ifdef($def, $yes, $no, $fn = 'identity') {
    return $fn(defined($def) ? $yes : $no);
}

/** 
 * @param mixed $s1
 * @param mixed $s2
 * @param mixed $eq
 * @param mixed $neq
 * @param callabke $fn
 */
function ifeqelse($s1, $s2, $eq, $neq, $fn = 'identity') {
    return $fn(($s1 == $s2) ? $eq : $neq);
}
