<?php

class ServerParams {
    const DEFAULT_PARAMS_ORIGIN = 'Unknown';
    private $params = null;
    private $params_origin = self::DEFAULT_PARAMS_ORIGIN;

    public function saveParams($new_value, $origin = self::DEFAULT_PARAMS_ORIGIN) {

        if (null == $this->params) {
            $this->params         = $new_value;
            $this->params_origin  = $origin;
        }
    }

    public function parseParams($uri_to_assoc = false) {
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

    public function getParams() {
        return $this->params;
    }

/*
    public function getOrigin() {
        return $this->params_origin;
    }
    */
}
