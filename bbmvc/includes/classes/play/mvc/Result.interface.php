<?php

interface play_mvc_Result {
    public function charset();
    public function contentType();
    public function cookie($name);
    public function cookies();
    public function flash();
    public function header($header);
    public function headers();
    public function redirectLocation();
    public function session();
    public function status();
}
