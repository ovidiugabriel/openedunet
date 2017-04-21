
package play.mvc.bodyparser;

// A body parser that first buffers
class BufferingBodyParser<A> extends MaxLengthBodyParser<A> {
    /* abstract class */
    private function new(maxLength:Int64, errorHandler:HttpErrorHandler, errorMessage:String) {}
    private function new(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler, errorMessage:String) {}

    @:final
    private function apply1(request:RequestHeader):Accumulator<ByteString, Either<Result,A>>{}
    private function parse(request:RequestHeader, bytes:ByteString):A { /* abstract */ }
}
