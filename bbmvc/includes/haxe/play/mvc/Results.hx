
package play.mvc;

/** 
 * @see https://www.playframework.com/documentation/2.5.x/api/java/play/mvc/Results.html
 */
class Results {
    static public function badRequest():StatusHeader;
    // Generates a 400 Bad Request result.

    static public function badRequest(byte[] content):Result;
    //Generates a 400 Bad Request result.

    static public function badRequest(play.twirl.api.Content content):Result;
    // Generates a 400 Bad Request result.

    static public function badRequest(play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a 400 Bad Request result.

    static public function badRequest(java.io.File content):Result;
    // Generates a 400 Bad Request result.

    static public function badRequest(java.io.File content, boolean inline):Result;
    // Generates a 400 Bad Request result.

    static public function badRequest(java.io.File content, java.lang.String filename):Result;
    // Generates a 400 Bad Request result.

    static public function badRequest(java.io.InputStream content):Result;
    // Generates a 400 Bad Request result.

    static public function badRequest(java.io.InputStream content, long contentLength):Result;
    // Generates a 400 Bad Request result.

    static public function badRequest(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 400 Bad Request result.

    static public function badRequest(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 400 Bad Request result.

    static public function badRequest(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 400 Bad Request result.

    static public function badRequest(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use badRequest() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.

    static public function badRequest(java.lang.String content):Result;
    // Generates a 400 Bad Request result.

    // Generates a 400 Bad Request result.
    static public function badRequest(content:String, charset:String):Result {
        #if java
        #end
    }

    static public function created():StatusHeader;
    // Generates a 201 Created result.

    static public function created(byte[] content):Result;
    // Generates a 201 Created result.

    static public function created(play.twirl.api.Content content):Result;
    // Generates a 201 Created result.

    static public function created(play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a 201 Created result.

    static public function created(java.io.File content):Result;
    // Generates a 201 Created result.

    static public function created(java.io.File content, boolean inline):Result;
    // Generates a 201 Created result.

    static public function created(java.io.File content, java.lang.String filename):Result;
    // Generates a 201 Created result.

    static public function created(java.io.InputStream content):Result;
    // Generates a 201 Created result.

    static public function created(java.io.InputStream content, long contentLength):Result;
    // Generates a 201 Created result.

    static public function created(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 201 Created result.

    static public function created(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 201 Created result.

    static public function created(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 201 Created result.

    static public function created(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use created() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.

    static public function  	created(java.lang.String content):Result;
    // Generates a 201 Created result.

    static public function  	created(java.lang.String content, java.lang.String charset):Result;
    // Generates a 201 Created result.

    static public function forbidden():StatusHeader;
    // Generates a 403 Forbidden result.
    
    static public function forbidden(byte[] content):Result;
    // Generates a 403 Forbidden result.

    static public function forbidden(play.twirl.api.Content content):Result;
    // Generates a 403 Forbidden result.

    static public function forbidden(play.twirl.api.Content content, java.lang.String charset):Result;
    //Generates a 403 Forbidden result.
    
    static public function forbidden(java.io.File content):Result;
    // Generates a 403 Forbidden result.

    static public function forbidden(java.io.File content, boolean inline):Result;
    // Generates a 403 Forbidden result.

    static public function forbidden(java.io.File content, java.lang.String filename):Result;
    // Generates a 403 Forbidden result.

    static public function forbidden(java.io.InputStream content):Result;
    // Generates a 403 Forbidden result.

    static public function forbidden(java.io.InputStream content, long contentLength):Result;
    // Generates a 403 Forbidden result.

    static public function forbidden(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 403 Forbidden result.

    static public function   	forbidden(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 403 Forbidden result.
    
    static public function  	forbidden(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 403 Forbidden result.
    
    static public function forbidden(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use forbidden() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.

    static public function forbidden(java.lang.String content):Result;
    // Generates a 403 Forbidden result.

    static public function forbidden(java.lang.String content, java.lang.String charset):Result;
    // Generates a 403 Forbidden result.

    static public function found(Call call):Result;
    // Generates a 302 Found result.

    static public function found(java.lang.String url):Result;
    // Generates a 302 Found result.

    static public function 	internalServerError():StatusHeader;
    // Generates a 500 Internal Server Error result.
    
    static public function internalServerError(byte[] content):Result;
    // Generates a 500 Internal Server Error result.

    static public function internalServerError(play.twirl.api.Content content):Result;
    // Generates a 500 Internal Server Error result.

    static public function internalServerError(play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a 500 Internal Server Error result.
    
    static public function internalServerError(java.io.File content):Result;
    // Generates a 500 Internal Server Error result.
    
    static public function internalServerError(java.io.File content, boolean inline):Result;
    // Generates a 500 Internal Server Error result.
    
    static public function internalServerError(java.io.File content, java.lang.String filename):Result;
    // Generates a 500 Internal Server Error result.

    static public function internalServerError(java.io.InputStream content):Result;
    // Generates a 500 Internal Server Error result.
    
    static public function internalServerError(java.io.InputStream content, long contentLength):Result;
    // Generates a 500 Internal Server Error result.

    static public function internalServerError(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 500 Internal Server Error result.
    
    static public function internalServerError(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 500 Internal Server Error result.
    
    static public function internalServerError(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 500 Internal Server Error result.

    static public function internalServerError(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use internalServerError() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.
    
    static public function internalServerError(java.lang.String content):Result;
    // Generates a 500 Internal Server Error result.

    static public function internalServerError(java.lang.String content, java.lang.String charset):Result;
    // Generates a 500 Internal Server Error result.

    static public function movedPermanently(Call call):Result;
    // Generates a 301 Moved Permanently result.

    static public function movedPermanently(java.lang.String url):Result;
    // Generates a 301 Moved Permanently result.

    static public function noContent():StatusHeader;
    // Generates a 204 No Content result.

    static public function notFound():StatusHeader;
    // Generates a 404 Not Found result.

    static public function notFound(byte[] content):Result;
    // Generates a 404 Not Found result.

    static public function notFound(play.twirl.api.Content content):Result;
    // Generates a 404 Not Found result.

    static public function notFound(play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a 404 Not Found result.

    static public function notFound(java.io.File content):Result;
    // Generates a 404 Not Found result.

    static public function notFound(java.io.File content, boolean inline):Result;
    // Generates a 404 Not Found result.

    static public function notFound(java.io.File content, java.lang.String filename):Result;
    // Generates a 404 Not Found result.
    
    static public function notFound(java.io.InputStream content):Result;
    // Generates a 404 Not Found result.

    static public function notFound(java.io.InputStream content, long contentLength):Result;
    // Generates a 404 Not Found result.

    static public function notFound(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 404 Not Found result.

    static public function notFound(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 404 Not Found result.

    static public function notFound(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 404 Not Found result.

    static public function notFound(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use notFound() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.

    static public function notFound(content:String):Result;
    // Generates a 404 Not Found result.
    
    static public function notFound(java.lang.String content, java.lang.String charset):Result;
    // Generates a 404 Not Found result.

    static public function ok():StatusHeader;
    // Generates a 200 OK result.

    static public function ok(byte[] content):Result;
    // Generates a 200 OK result.

    static public function ok(play.twirl.api.Content content):Result;
    // Generates a 200 OK result.

    static public function ok(play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a 200 OK result.

    static public function ok(java.io.File content):Result;
    // Generates a 200 OK result.

    static public function ok(java.io.File content, boolean inline):Result;
    // Generates a 200 OK result.

    static public function ok(java.io.File content, java.lang.String filename):Result;
    // Generates a 200 OK result.

    static public function ok(java.io.InputStream content):Result;
    // Generates a 200 OK result.

    static public function ok(java.io.InputStream content, long contentLength):Result;
    // Generates a 200 OK result.

    static public function ok(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 200 OK result.

    static public function ok(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 200 OK result.

    static public function ok(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 200 OK result.

    static public function ok(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use ok() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.
    
    static public function ok(content:String):Result;
    // Generates a 200 OK result.

    static public function ok(content:String, charset:String):Result;
    // Generates a 200 OK result.
    
    static public function paymentRequired():StatusHeader;
    // Generates a 402 Payment Required result.

    static public function paymentRequired(byte[] content):Result;
    // Generates a 402 Payment Required result.

    static public function paymentRequired(play.twirl.api.Content content):Result;
    // Generates a 402 Payment Required result.

    static public function paymentRequired(play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a 402 Payment Required result.

    static public function paymentRequired(java.io.File content):Result;
    // Generates a 402 Payment Required result.

    static public function 	paymentRequired(java.io.File content, boolean inline):Result;
    // Generates a 402 Payment Required result.

    static public function 	paymentRequired(java.io.File content, java.lang.String filename):Result;
    // Generates a 402 Payment Required result.

    static public function 	paymentRequired(java.io.InputStream content):Result;
    // Generates a 402 Payment Required result.

    static public function 	paymentRequired(java.io.InputStream content, long contentLength):Result;
    // Generates a 402 Payment Required result.

    static public function 	paymentRequired(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 402 Payment Required result.

    static public function 	paymentRequired(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 402 Payment Required result.

    static public function 	paymentRequired(com.fasterxml.jackson.databind.JsonNode content, charset:String):Result;
    // Generates a 402 Payment Required result.

    static public function 	paymentRequired(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use paymentRequired() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.
    
    static public function 	paymentRequired(content:String):Result;
    // Generates a 402 Payment Required result.

    static public function 	paymentRequired(content:String, charset:String):Result;
    // Generates a 402 Payment Required result.

    static public function 	permanentRedirect(Call call):Result;
    // Generates a 308 Permanent Redirect result.

    static public function 	permanentRedirect(url:String):Result;
    // Generates a 308 Permanent Redirect result.

    static public function 	redirect(Call call):Result;
    // Generates a 303 See Other result.

    static public function 	redirect(url:String):Result;
    // Generates a 303 See Other result.

    static public function 	seeOther(Call call):Result;
    // Generates a 303 See Other result.

    static public function 	seeOther(url:String):Result;
    // Generates a 303 See Other result.

    static public function 	status(status:Int):StatusHeader;
    // Generates a simple result.

    static public function 	status(status:Int, byte[] content):Result;
    // Generates a simple result with byte-array content.

    static public function status(status:Int, akka.util.ByteString content):Result;
    // Generates a simple result.

    static public function 	status(status:Int, play.twirl.api.Content content):Result;
    // Generates a simple result.

    static public function status(status:Int, play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a simple result.

    static public function status(status:Int, java.io.File content):Result;
    // Generates a result with file contents.

    static public function status(status:Int, java.io.File content, boolean inline):Result;
    // Generates a result with file content.

    static public function status(status:Int, java.io.File content, java.lang.String fileName):Result;
    // Generates a result.

    static public function status(status:Int, java.io.InputStream content):Result;
    // Generates a chunked result.

    static public function status(status:Int, java.io.InputStream content, long contentLength):Result;
    // Generates a chunked result.

    static public function status(status:Int, com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a simple result with json content and UTF8 encoding.

    static public function status(status:Int, com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a simple result with json content.

    static public function status(status:Int, com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a simple result with json content.

    static public function status(status:Int, Results.Chunks<?> chunks):Result;
    static public function status(status:Int, content:String):Result;
    // Generates a simple result.
    
    /**
        Generates a simple result.
     **/
    static public function status(status:Int, content:String, charset:String):Result;
    
    
    static public function temporaryRedirect(Call call):Result;
    // Generates a 307 Temporary Redirect result.

    static public function temporaryRedirect(java.lang.String url):Result;
    // Generates a 307 Temporary Redirect result.

    static public function unauthorized():StatusHeader;
    // Generates a 401 Unauthorized result.

    static public function unauthorized(byte[] content):Result;
    // Generates a 401 Unauthorized result.

    static public function unauthorized(play.twirl.api.Content content):Result;
    // Generates a 401 Unauthorized result.

    static public function unauthorized(play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a 401 Unauthorized result.

    static public function unauthorized(java.io.File content):Result;
    // Generates a 401 Unauthorized result.

    static public function unauthorized(java.io.File content, boolean inline):Result;
    // Generates a 401 Unauthorized result.

    static public function unauthorized(java.io.File content, java.lang.String filename):Result;
    // Generates a 401 Unauthorized result.
    
    static public function unauthorized(java.io.InputStream content):Result;
    // Generates a 401 Unauthorized result.

    static public function unauthorized(java.io.InputStream content, long contentLength):Result;
    // Generates a 401 Unauthorized result.

    static public function unauthorized(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 401 Unauthorized result.

    static public function unauthorized(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 401 Unauthorized result.

    static public function unauthorized(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 401 Unauthorized result.

    static public function unauthorized(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use unauthorized() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.

    // Generates a 401 Unauthorized result.
    static public function unauthorized(java.lang.String content):Result;

    // Generates a 401 Unauthorized result.
    static public function unauthorized(java.lang.String content, java.lang.String charset):Result;
    
}
