<?php

//
// | Format                   | Type                | 
// |--------------------------|---------------------|
// | PATH_INFO_JSON           | Map<String, String> |
// | PATH_INFO_SPLIT_COLON    | Array<String>       |
// | PATH_INFO_SPLIT_SLASH    | Array<String>       |
// | PATH_INFO_SPLIT_ASSOC    | Map<String, String> |
// | QUERY_STRING_JSON        | Map<String, String> |
// | QUERY_STRING_SPLIT_COLON | Array<String>       |
// | QUERY_STRING_SPLIT_SLASH | Array<String>       |
//

class ServerParams {

    private $params = null;
    private $params_origin = 'Unknown';
    
    // TODO: Configure what do you want to collect using getParams() function.

    /** 
     * This is the main interface function for this class.
     * 
     * The public interface will expose something like:
     *      static function php.Web.getParams():Map<String, String>
     * but much more generic.
     * 
     * @return array
     */
    public function getParams() {
        // TODO: Separate function for case when return value is of type Array<String> instead of Map<String, String>
        return $this->params;
    }

    /** 
     * Parses the server environment variables for the current request.
     * Results are stored in the current object.
     * 
     * @param boolean $uri_to_assoc
     * @return null
     */
    public function parseParams($uri_to_assoc = false) {
        $uri_to_assoc = (bool) $uri_to_assoc;
        if (isset($_SERVER['PATH_INFO'])) {
            $this->parsePathInfo($uri_to_assoc);
        }

        if (isset($_SERVER['QUERY_STRING'])) {
            $this->parseQueryString();
        }

        if (count($_REQUEST) > 0) {
            $this->saveParams($_REQUEST, 'REQUEST');
        }
    }

    private function saveParams($new_value, $origin = 'Unknown') {

        if (null == $this->params) {
            $this->params         = $new_value;
            $this->params_origin  = $origin;
        }
    }

    static
    private function uriToAssoc($trimed) {
        // Use this function to get the assoc... from
        $splits = explode('/', $trimed);
        $n_splits = count($splits);
        $dict = array();
        for ($i = 0; $i < $n_splits; $i+=2) {
            if (isset( $splits[$i+1] )) {
                $dict[$splits[$i]] = $splits[$i+1];
            }
        }
        return $dict;
    }

    private function parsePathInfo($uri_to_assoc = false) {
        $trimed = ltrim($_SERVER['PATH_INFO'] ,'/');
        $PATH_INFO_FROM_JSON = json_decode($trimed);

        if (null !== $PATH_INFO_FROM_JSON) {
            $PATH_INFO = (array) $PATH_INFO_FROM_JSON;
            $this->saveParams($PATH_INFO, 'PATH_INFO_JSON');
        } else {
            if (false !== strpos($trimed, ':')) {
                $splits = explode(':', $trimed);
                $this->saveParams($splits, 'PATH_INFO_SPLIT_COLON');

            } elseif (false !== strpos($trimed, '/')) {

                // Also called "Segment Array"

                if (!$uri_to_assoc) {
                    $splits = explode('/', $trimed);
                    $this->saveParams($splits, 'PATH_INFO_SPLIT_SLASH');
                } else {
                    $dict = ServerParams::uriToAssoc($trimed);
                    $this->saveParams($dict, 'PATH_INFO_SPLIT_ASSOC');
                }
            }
        }
    }

    private function parseQueryString() {
        $QUERY_STRING_JSON      = urldecode($_SERVER['QUERY_STRING']);
        $QUERY_STRING_FROM_JOSN = json_decode($QUERY_STRING_JSON);
        if (null !== $QUERY_STRING_FROM_JOSN) {
            $QUERY_STRING = (array) $QUERY_STRING_FROM_JOSN;
            $this->saveParams($QUERY_STRING, 'QUERY_STRING_JSON');

            // If query string contains valid JSON encoded data
            // then GET and REQUEST keys must be cleared
            $QUERY_STRING_JSON = str_replace(' ', '_', $QUERY_STRING_JSON);
            unset($_GET[$QUERY_STRING_JSON]);
            unset($_REQUEST[$QUERY_STRING_JSON]);
        } else {


            if (isset($_GET [$_SERVER['QUERY_STRING']]  )) {
                if (false !== strpos($_SERVER['QUERY_STRING'], ':')) {
                    $splits = explode(':', $_SERVER['QUERY_STRING']);
                    $this->saveParams($splits,'QUERY_STRING_SPLIT_COLON');
                } elseif (false !== strpos($_SERVER['QUERY_STRING'], '/')) {
                    $splits = explode('/', $_SERVER['QUERY_STRING']);
                    $this->saveParams($splits, 'QUERY_STRING_SPLIT_SLASH');
                }
            }

        }
    }

/*
    public function getOrigin() {
        return $this->params_origin;
    }
    */
}
