
package play.mvc.bodyparser;

// Guess the body content by checking the Content-Type header.
class AnyContent implements BodyParser<Dynamic> {
    public function new( errorHandler:HttpErrorHandler, httpConfiguration:HttpConfiguration) {}
    public function apply(request:RequestHeader):Accumulator<ByteString, Either<Result,Object>>{}
}
