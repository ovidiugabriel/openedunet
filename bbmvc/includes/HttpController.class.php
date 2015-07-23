<?php

/**
 * Allows to write REST web-services.
 *
 * @package barebone
 * @access public
 */
abstract class HttpController {
    /**
     * @proto private new()
     */
    private function __construct() {}

    /**
     * @param Request $request
     * @return Response
     * @proto protected doDelete(request:Request):Response
     */
    abstract protected function doDelete(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected doGet(request:Request):Response
     */
    abstract protected function doGet(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected doHead(request:Request):Response
     */
    abstract protected function doHead(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected doOptions(request:Request):Response
     */
    abstract protected function doOptions(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected doPost(request:Request):Resposne
     */
    abstract protected function doPost(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected doPut(request:Request):Response
     */
    abstract protected function doPut(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected doTrace(request:Request):Response
     */
    abstract protected function doTrace(Request $request);

    /**
     * @param Request $request
     * @return integer
     * @proto protected getLastModified(request:Request):Int
     */
    abstract protected function getLastModified(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto public service(request:Request):Response
     */
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
