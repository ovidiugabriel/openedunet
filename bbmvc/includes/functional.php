<?php

/** 
 * @param object|array $lst
 * @return array
 */
function from_pharen_vector($lst) {
    if (is_object($lst) && get_class($lst) == 'PharenVector') {
        return arr($lst);
    }
    return $lst;
}

/** 
 * @param object|array $lst
 * @param callable $callbakc
 * @return mixed
 */
function foldl($lst, $callback){
	return array_reduce(from_pharen_vector($lst), $callback);
}

/** 
 * @param object|array $lst
 * @param callable $callback
 * @return mixed
 */
function foldr($lst, $callback){
	return array_reduce(array_reverse(from_pharen_vector($lst)), $callback);
}

/** 
 * @param object|array $a
 * @param callable $callback
 * @param callable $forelse
 * @return Iteration
 */
function for_each($a, $callback, $forelse = null) {
    $a = from_pharen_vector($a);
    $n = count($a);
    $it = new Iteration(0, $n);
    
    if ($n > 0) {
        for ($i = 0; $i < $n; $i++) {
            $it = new Iteration($i, $n);
            $callback($it, $a[$i]);
        }   
    } elseif (null != $forelse) {
	$forelse();
    }
    return $it;
}

