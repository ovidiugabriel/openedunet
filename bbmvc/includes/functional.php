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
