
package play.mvc.bodyparser;

// Store the body content in a RawBuffer.
class Raw {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
