<?php

// Feature test macros

// Are testing the availability of a specific language feature
// without the need for the user to test the version of PHP each time
// when a feature availability is tested

// 5.3.0 - Anonymous functions become available. 
if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
    define ('_ANONYMOUS_FUNCTIONS', 1);
}
