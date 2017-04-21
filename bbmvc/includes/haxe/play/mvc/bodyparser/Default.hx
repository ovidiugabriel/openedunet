
package play.mvc.bodyparser;

// If PATCH, POST, or PUT, guess the body content by checking the Content-Type header.
class Default {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
