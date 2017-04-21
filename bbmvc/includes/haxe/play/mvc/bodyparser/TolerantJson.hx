
package play.mvc.bodyparser;

// Parse the body as Json without checking the Content-Type.
class TolerantJson {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
