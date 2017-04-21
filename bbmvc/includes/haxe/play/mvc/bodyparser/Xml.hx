
package play.mvc.bodyparser;

// Parse the body as Xml if the Content-Type is application/xml.
class Xml {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
  
    public function apply(request:RequestHeader):Accumulator<ByteString, Either<Result,Document>>{}
}
