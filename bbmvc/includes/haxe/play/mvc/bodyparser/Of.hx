
package play.mvc.bodyparser;

// Specify the body parser to use for an Action method.
interface Of {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
