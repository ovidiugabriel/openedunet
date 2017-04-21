
package play.mvc.bodyparser;

// Parse the body as text without checking the Content-Type.
class TolerantText {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
