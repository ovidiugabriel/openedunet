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

    /**
     * @param Request $request
     * @return Response
     * @proto protected delete(request:Request):Response
     */
    abstract protected function delete(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected get(request:Request):Response
     */
    abstract protected function get(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected head(request:Request):Response
     */
    abstract protected function head(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected options(request:Request):Response
     */
    abstract protected function options(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected post(request:Request):Resposne
     */
    abstract protected function post(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected put(request:Request):Response
     */
    abstract protected function put(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected trace(request:Request):Response
     */
    abstract protected function trace(Request $request);

    /**
     * @param Request $request
     * @return Response
     * @proto protected connect(request:Request):Response
     */
    abstract protected function connect(Request $request);

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
