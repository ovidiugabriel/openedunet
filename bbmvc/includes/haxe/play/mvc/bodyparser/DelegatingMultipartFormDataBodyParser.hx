
package play.mvc.bodyparser;

// A body parser that exposes a file part handler as an abstract method and delegates the implementation 
// to the underlying Scala multipartParser.
class DelegatingMultipartFormDataBodyParser<A> implements BodyParser<MultipartFormData<A>> {
    public function new(materializer:Materializer, maxLength:Int64){}
    public function createFilePartHandler():Function<FileInfo, Accumulator<ByteString, FilePart<A>>> {
        /* abstract */
    }            
    public function apply(request:RequestHeader):Accumulator<ByteString, Either<Result, MultipartFormData<A>>> {}
}
