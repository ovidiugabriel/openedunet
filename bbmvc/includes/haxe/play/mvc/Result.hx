
package play.mvc;

/* public */ class Result /* extends Object */ {
    Result(int status)
    // Create a result with no entity.
    Result(int status, HttpEntity body)
    // Create a result.
    Result(int status, java.util.Map<java.lang.String,java.lang.String> headers)
    // Create a result with no body.
    Result(int status, java.util.Map<java.lang.String,java.lang.String> headers, HttpEntity body)
    // Create a result.
    Result(int status, java.util.Optional<java.lang.String> reasonPhrase, java.util.Map<java.lang.String,java.lang.String> headers, HttpEntity body)
    // Create a result.
    Result(play.api.mvc.ResponseHeader header, HttpEntity body)
    // Create a result from a Scala ResponseHeader and a body.
}
