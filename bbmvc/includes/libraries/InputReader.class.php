<?php

class InputReader {
    /**
     * Gets the list of arguments.
     * This is usually what you get as argv parameter to the main function.
     *
     * @return SplFixedArray
     */
    static public function getSplFixedArray() {
        $result = array();

        //
        // If a slash and additional directory name(s) are appended to the URL immediately
        // after the name of the script, then that path is stored in the PATH_INFO
        // environment variable before the script is called.
        //
        // So the CLI script expects to have this environment variable set.
        //
        $path_info = getenv('PATH_INFO');
        if ($path_info) {
            $result = explode('/', $path_info);
        } else {
            //
            // Otherwise we get arguments from the well-known argv variable.
            // Which is usually passed as argument to the main function
            //
            $result = array_slice($GLOBALS['argv'], 1);
        }

        return SplFixedArray::fromArray($result);
    }  
  
   /**
     * Lets you turn a SplFixedArray into an ArrayObject.
     *
     * @param SplFixedArray $args
     * @return ArrayObject
     */
    static public function toAssoc(SplFixedArray $args) {
        $result = new ArrayObject();
        throw new Exception("Not implemented yet", 1);

        return $result;
    }
}
