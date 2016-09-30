<?php

function foldl($lst, $callback){
    return array_reduce(arr($lst), $callback);
}

function foldr($lst, $callback){
    return array_reduce(array_reverse(arr($lst)), $callback);
}
