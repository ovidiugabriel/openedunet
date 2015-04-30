<?php

//
// | Format                   | Type                | 
// |--------------------------|---------------------|
// | REQUEST                  | Map<String, String> |
// | PATH_INFO_JSON           | Map<String, String> |
// | PATH_INFO_SPLIT_COLON    | Array<String>       |
// | PATH_INFO_SPLIT_SLASH    | Array<String>       |
// | PATH_INFO_SPLIT_ASSOC    | Map<String, String> |
// | QUERY_STRING_JSON        | Map<String, String> |
// | QUERY_STRING_SPLIT_COLON | Array<String>       |
// | QUERY_STRING_SPLIT_SLASH | Array<String>       |
//
class ServerParams {

    const TYPE_NULL = 'null';
    const TYPE_LIST = 'list';
    const TYPE_DICT = 'dict';

    //
    // For debug only
    //
    const DEBUG_REQUEST                  = 'REQUEST';
    const DEBUG_PATH_INFO_JSON           = 'PATH_INFO_JSON';
    const DEBUG_PATH_INFO_SPLIT_COLON    = 'PATH_INFO_SPLIT_COLON';
    const DEBUG_PATH_INFO_SPLIT_SLASH    = 'PATH_INFO_SPLIT_SLASH';
    const DEBUG_PATH_INFO_SPLIT_ASSOC    = 'PATH_INFO_SPLIT_ASSOC';
    const DEBUG_QUERY_STRING_JSON        = 'QUERY_STRING_JSON';
    const DEBUG_QUERY_STRING_SPLIT_COLON = 'QUERY_STRING_SPLIT_COLON';
    const DEBUG_QUERY_STRING_SPLIT_SLASH = 'QUERY_STRING_SPLIT_SLASH';

    private $params_origin = 'Unknown';

    private $params_list = null;
    private $params_dict = null;

    // TODO: Configure what do you want to collect using getParams() function.

    /**
     * This is the main interface function for this class.
     *
     * The public interface will expose something like:
     *      static function php.Web.getParams():Map<String, String>
     * but much more generic.
     *
     * @return list
     */
    public function getParamsList() {
        return $this->params_list;
    }

    /**
     * @return dictionary
     */
    public function getParamsDict() {
        return $this->params_dict;
    }

    public function getParamsType() {
        if ( (null !== $this->params_dict) &&
             (safe_count($this->params_dict) > 0) )
        {
            return 'dict';
        }

        if ( (null !== $this->params_list) &&
             (safe_count($this->params_list) > 0) )
        {
            return 'list';
        }

        return 'null';
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

        // If not already filled with parameters
        if ((null == $this->params_list) && (null == $this->params_dict))
        {
            if (count($_REQUEST) > 0) {
                $this->saveParams($_REQUEST, self::TYPE_DICT,  self::DEBUG_REQUEST);
            }
        }
    }

    private function saveParams($new_value, $type, $origin = 'Unknown') {

        if (self::TYPE_LIST == $type) {
            if (null == $this->params_list) {
                // echo 'list .. ok';
                $this->params_list = $new_value;
            }
        } elseif (self::TYPE_DICT == $type) {
            if (null == $this->params_dict) {
                $this->params_dict = $new_value;
            }
        }

        $this->params_origin  = $origin;
    }

    static
    private function uriToAssoc($input) {
        // Use this function to get the assoc... from
        $splits = explode('/', $input);
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
            $this->saveParams($PATH_INFO, self::TYPE_DICT, self::DEBUG_PATH_INFO_JSON);
        } else {
            if (false !== strpos($trimed, ':')) {
                $splits = explode(':', $trimed);
                $this->saveParams($splits, self::TYPE_LIST, self::DEBUG_PATH_INFO_SPLIT_COLON);
            } elseif (false !== strpos($trimed, '/')) {
                // Also called "Segment Array"

                if (!$uri_to_assoc) {
                    $splits = explode('/', $trimed);
                    // var_dump($splits); die;
                    $this->saveParams($splits, self::TYPE_LIST, self::DEBUG_PATH_INFO_SPLIT_SLASH);
                } else {
                    $dict = ServerParams::uriToAssoc($trimed);
                    $this->saveParams($dict, self::TYPE_DICT, self::DEBUG_PATH_INFO_SPLIT_ASSOC);
                }
            }
        }
    }

    private function parseQueryString() {
        $QUERY_STRING_JSON      = urldecode($_SERVER['QUERY_STRING']);
        $QUERY_STRING_FROM_JOSN = json_decode($QUERY_STRING_JSON);
        if (null !== $QUERY_STRING_FROM_JOSN) {
            $QUERY_STRING = (array) $QUERY_STRING_FROM_JOSN;
            $this->saveParams($QUERY_STRING, self::TYPE_DICT, self::DEBUG_QUERY_STRING_JSON);

            // If query string contains valid JSON encoded data
            // then GET and REQUEST keys must be cleared
            $QUERY_STRING_JSON = str_replace(' ', '_', $QUERY_STRING_JSON);
            unset($_GET[$QUERY_STRING_JSON]);
            unset($_REQUEST[$QUERY_STRING_JSON]);
        } else {
            if (isset($_GET[$_SERVER['QUERY_STRING']]  )) {
                if (false !== strpos($_SERVER['QUERY_STRING'], ':')) {
                    $splits = explode(':', $_SERVER['QUERY_STRING']);
                    // var_dump($splits); die;
                    $this->saveParams($splits, self::TYPE_LIST, self::DEBUG_QUERY_STRING_SPLIT_COLON);
                } elseif (false !== strpos($_SERVER['QUERY_STRING'], '/')) {
                    $splits = explode('/', $_SERVER['QUERY_STRING']);
                    $this->saveParams($splits, self::TYPE_LIST, self::DEBUG_QUERY_STRING_SPLIT_SLASH);
                }
            }
        }
    }

    public function getOrigin() {
        return $this->params_origin;
    }

}
