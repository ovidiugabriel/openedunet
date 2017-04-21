
package play.mvc.bodyparser;

// Parse the body as a byte string.
class Bytes {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
