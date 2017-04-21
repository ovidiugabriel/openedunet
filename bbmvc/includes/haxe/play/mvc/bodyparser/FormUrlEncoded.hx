
package play.mvc.bodyparser;

// Parse the body as form url encoded if the Content-Type is application/x-www-form-urlencoded.
class FormUrlEncoded {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
