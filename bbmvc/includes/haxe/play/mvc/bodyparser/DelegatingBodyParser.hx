
package play.mvc.bodyparser;

// A body parser that delegates to a Scala body parser, and uses the supplied function to transform its result to a Java body.
class DelegatingBodyParser<A,B> {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
