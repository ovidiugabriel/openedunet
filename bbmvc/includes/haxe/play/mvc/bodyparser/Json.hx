
package play.mvc.bodyparser;

// Parse the body as Json if the Content-Type is text/json or application/json.
class Json {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
