
package play.mvc.bodyparser;

// A body parser that exposes a file part handler as an abstract method and delegates the implementation 
// to the underlying Scala multipartParser.
class DelegatingMultipartFormDataBodyParser<A> {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
