
// See: https://www.playframework.com/documentation/2.5.x/api/java/play/mvc/BodyParser.html

package play.mvc;

interface BodyParser<A> {
    public function apply(request:RequestHeader):Accumulator<ByteString, Either<Result, A>>;
}
