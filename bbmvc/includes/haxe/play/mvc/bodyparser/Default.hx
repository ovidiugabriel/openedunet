
package play.mvc.bodyparser;

// If PATCH, POST, or PUT, guess the body content by checking the Content-Type header.
class Default extends AnyContent {
    public function new(errorHandler:HttpErrorHandler, httpConfiguration:HttpConfiguration) {}
    public function apply(request:RequestHeader):Accumulator<ByteString, Either<Result, Object>>{}
}
