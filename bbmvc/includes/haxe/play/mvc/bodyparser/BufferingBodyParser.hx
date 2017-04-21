
package play.mvc.bodyparser;

// A body parser that first buffers
class BufferingBodyParser<A> {
    private function new(maxLength:Int64, errorHandler:HttpErrorHandler, errorMessage:String) {}
    private function new(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler, errorMessage:String) {}

    @:final
    private function apply(request:RequestHeader):Accumulator<ByteString, Either<Result,A>>{}
    private function parse(request:RequestHeader, bytes:ByteString):A { /* abstract */ }
}
