<?php

class play_mvc_Result {
}

if (!class_exists('Result')) { // First check if the global namespace is not yet poluted
    // The make use of play.mvc.Result class
    class Result extends play_mvc_Result { }
}