
package play.mvc.bodyparser;

// Parse the body as text if the Content-Type is text/plain.
class Text {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
