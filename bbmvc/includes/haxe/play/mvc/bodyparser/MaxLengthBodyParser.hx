
package play.mvc.bodyparser;

// Abstract body parser that enforces a maximum length.
class MaxLengthBodyParser<A> {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
