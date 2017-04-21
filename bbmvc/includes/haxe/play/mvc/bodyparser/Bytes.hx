
package play.mvc.bodyparser;

// Parse the body as a byte string.

class Bytes extends BufferingBodyParser<ByteString> {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
    
    private function parse(request:RequestHeader, bytes:ByteString):ByteString {}
}
