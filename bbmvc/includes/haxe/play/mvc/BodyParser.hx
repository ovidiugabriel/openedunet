
// See: https://www.playframework.com/documentation/2.5.x/api/java/play/mvc/BodyParser.html

package play.mvc;

interface BodyParser<A> {
    public function apply(request:RequestHeader):Accumulator<ByteString, Either<Result, A>>;
}

package play.mvc.bodyparser;

// Parse the body as a byte string.
class Bytes {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// If PATCH, POST, or PUT, guess the body content by checking the Content-Type header.
class Default {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// A body parser that delegates to a Scala body parser, and uses the supplied function to transform its result to a Java body.
class DelegatingBodyParser<A,B> {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// A body parser that exposes a file part handler as an abstract method and delegates the implementation 
// to the underlying Scala multipartParser.
class DelegatingMultipartFormDataBodyParser<A> {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Don't parse the body.
class Empty {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Parse the body as form url encoded if the Content-Type is application/x-www-form-urlencoded.
class FormUrlEncoded {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Parse the body as Json if the Content-Type is text/json or application/json.
class Json {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Abstract body parser that enforces a maximum length.
class MaxLengthBodyParser<A> {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Parse the body as multipart form-data without checking the Content-Type.
class MultipartFormData {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Specify the body parser to use for an Action method.
interface Of {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Store the body content in a RawBuffer.
class Raw {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Parse the body as text if the Content-Type is text/plain.
class Text {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Parse the body as Json without checking the Content-Type.
class TolerantJson {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Parse the body as text without checking the Content-Type.
class TolerantText {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Parse the body as Xml without checking the Content-Type.
class	TolerantXml {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}

package play.mvc.bodyparser;

// Parse the body as Xml if the Content-Type is application/xml.
class Xml {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
  
    public function apply(request:RequestHeader):Accumulator<ByteString, Either<Result,Document>>{}
}

