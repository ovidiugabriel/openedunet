
package play.mvc.bodyparser;

import play.libs.f.Either;

typedef Optional = Null;

// Don't parse the body.
class Empty implements BodyParser<Optional<Void>> {
    public function new() {}
    public function apply(request:RequestHeader): Accumulator<ByteString, Either<Result, Optional<Void>>> {}
}
