<?php

interface play_mvc_Http_Status {}
interface play_mvc_Http_HeaderNames {}

interface play_mvc_Result {}

class play_mvc_Results_Redirect implements play_mvc_Result {
    const FOUND              = 302;
    const MOVED_PERMANENTLY  = 301;
    const SEE_OTHER          = 303;
    const TEMPORARY_REDIRECT = 307;

    private $status;
    private $url;

    public function __construct($status, $url = '') {
        $this->status = (int) $status;
        $this->url = $url;
    }
}

class play_mvc_Results_Status implements play_mvc_Result {
    const BAD_REQUEST           = 400;
    const CREATED               = 201;
    const FORBIDDEN             = 403;
    const INTERNAL_SERVER_ERROR = 500;
    const MOVED_PERMANENTLY     = 301;
    const NO_CONTENT            = 204;
    const NOT_FOUND             = 404;
    const OK                    = 200;
    const SEE_OTHER             = 303;
    const TEMPORARY_REDIRECT    = 307;
    const UNAUTHORIZED          = 401;

    private $status;
    private $content;

    /* Constructor of: play_mvc_Results_Status */
    public function __construct($status, $content = '') {
        $this->status = (int) $status;
        $this->content = $content;
    }
}

class play_mvc_Results {
    static public function __exec__($method, $args) {
        return call_user_func_array(array(__CLASS__, $method), $args);
    }

    /**
     * @return play_mvc_Result
     */
    static public function badRequest() {
        $args = func_get_args();
        return new play_mvc_Results_Status(play_mvc_Results_Status::BAD_REQUEST);
    }

    /**
     * @return play_mvc_Result
     */
    static public function created() {
        $args = func_get_args();
        return new play_mvc_Results_Status(play_mvc_Results_Status::CREATED);
    }

    /**
     * @return play_mvc_Result_Status
     */
    static public function forbidden() {
        $args = func_get_args();
        return new play_mvc_Results_Status(play_mvc_Results_Status::FORBIDDEN);
    }

    /**
     * @return play_mvc_Result
     */
    static public function found($url = null) {
        debug_print_backtrace();
        return new play_mvc_Results_Redirect(play_mvc_Results_Redirect::FOUND);
    }

    /**
     * @return play_mvc_Result_Status
     */
    static public function internalServerError() {
        debug_print_backtrace();
        return new play_mvc_Results_Status(play_mvc_Results_Status::INTERNAL_SERVER_ERROR);
    }

    /**
     * @return play_mvc_Result
     */
    static public function movedPermanently() {
        debug_print_backtrace();
        return new play_mvc_Results_Redirect(play_mvc_Results_Redirect::MOVED_PERMANENTLY);
    }

    static public function noContent() {
        debug_print_backtrace();
        return new play_mvc_Results_Status(play_mvc_Results_Status::NO_CONTENT);
    }

    static public function notFound() {
        debug_print_backtrace();
        return new play_mvc_Results_Status(play_mvc_Results_Status::NOT_FOUND);
    }

    static public function ok() {
        debug_print_backtrace();
        return new play_mvc_Results_Status(play_mvc_Results_Status::OK);
    }

    static public function redirect() {
        debug_print_backtrace();
        // TODO: may be change for backward compatibility
        return new play_mvc_Results_Redirect(play_mvc_Results_Redirect::SEE_OTHER);
    }

    static public function seeOther() {
        debug_print_backtrace();
        return new play_mvc_Results_Redirect(play_mvc_Results_Redirect::SEE_OTHER);
    }

    static public function status($status, $content = '') {
        $status = (int) $status;
        debug_print_backtrace();
        return new play_mvc_Result_Status($status, $content);
    }

    static public function temporaryRedirect($url) {
        debug_print_backtrace();
        return new play_mvc_Results_Redirect(play_mvc_Results_Redirect::TEMPORARY_REDIRECT, $url);
    }

    static public function unauthorized() {
        debug_print_backtrace();
        return new play_mvc_Result_Status(play_mvc_Result_Status::UNAUTHORIZED);
    }
}

abstract class play_mvc_Controller
    extends play_mvc_Results
    implements play_mvc_Http_Status, play_mvc_Http_HeaderNames
{

}

class Dispatcher {
    static public function getResponseCode(play_mvc_Result $result) {
        $refl = new ReflectionClass($result);
        $property = $refl->getProperty('status');
        $property->setAccessible (true);
        $status = (int) $property->getValue($result);
        $property->setAccessible (false);
        return (int) $status;
    }
}

