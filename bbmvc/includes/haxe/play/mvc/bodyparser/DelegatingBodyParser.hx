
package play.mvc.bodyparser;

// A body parser that delegates to a Scala body parser, and uses the supplied function to transform its result to a Java body.
class DelegatingBodyParser<A,B> implements BodyParser<A> {
    public function new(delegate:BodyParser<B>, transform:Function<B,A>){}
    public function apply(request:RequestHeader):Accumulator<ByteString, Either<Result,A>>{}
}
