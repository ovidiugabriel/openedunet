<?php

// Allows to write REST web-services
class HttpController {
    // @proto private new()
    private function __construct() {}
  
    // @proto protected doDelete(request:Request):Response
    protected function doDelete(Request $request) {}
  
    // @proto protected doGet(request:Request):Response
    protected function doGet(Request $request) {}
  
    // @proto protected doHead(request:Request):Response
    protected function doHead(Request $request) {}
  
    // @proto protected doOptions(request:Request):Response
    protected function doOptions(Request $request) {}
  
    // @proto protected doPost():Resposne
    protected function doPost(Request $request) {}
  
    // @proto protected doPut():Response
    protected function doPut(Request $request) {}
  
    // @proto protected doTrace():Response
    protected function doTrace(Request $request) {}
  
    // @proto protected getLastModified(request:Request):Int
    protected function getLastModified(Request $request) {}
  
    // @proto public service(request:Request):Response
    public function service(Request $request) {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'DELETE':  return $this->doDelete();
            case 'GET':     return $this->doGet();
            case 'HEAD':    return $this->doHead();
            case 'OPTIONS': return $this->doOptions();
            case 'POST':    return $this->doPost();
            case 'PUT':     return $this->doPut();
            case 'TRACE':   return $this->doTrace();
        }
        throw new Exception("Invalid HTTP method: {$_SERVER['REQUEST_METHOD']}", 1);
    }
}
