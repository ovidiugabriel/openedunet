
package play.mvc;

/** 
 * @see https://www.playframework.com/documentation/2.5.x/api/java/play/mvc/Results.html
 */
extern class Results {
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

    static public function badRequest(java.lang.String content, java.lang.String charset):Result;
    // Generates a 400 Bad Request result.

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

    static  	created(java.io.InputStream content):Result;
    // Generates a 201 Created result.

    static  	created(java.io.InputStream content, long contentLength):Result;
    // Generates a 201 Created result.

    static  	created(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 201 Created result.

    static  	created(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 201 Created result.

    static  	created(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 201 Created result.

    static  	created(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use created() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.

    static  	created(java.lang.String content):Result;
    // Generates a 201 Created result.

    static  	created(java.lang.String content, java.lang.String charset):Result;
    // Generates a 201 Created result.

    static  	forbidden():StatusHeader;
    // Generates a 403 Forbidden result.
    
    static  	forbidden(byte[] content):Result;
    // Generates a 403 Forbidden result.

    static  	forbidden(play.twirl.api.Content content):Result;
    // Generates a 403 Forbidden result.

    static  	forbidden(play.twirl.api.Content content, java.lang.String charset):Result;
    //Generates a 403 Forbidden result.
    
    static  	forbidden(java.io.File content):Result;
    // Generates a 403 Forbidden result.

    static  	forbidden(java.io.File content, boolean inline):Result;
    // Generates a 403 Forbidden result.

    static  	forbidden(java.io.File content, java.lang.String filename):Result;
    // Generates a 403 Forbidden result.

    static  	forbidden(java.io.InputStream content):Result;
    // Generates a 403 Forbidden result.

    static  	forbidden(java.io.InputStream content, long contentLength):Result;
    // Generates a 403 Forbidden result.

    static  	forbidden(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 403 Forbidden result.

    static  	forbidden(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 403 Forbidden result.
    
    static  	forbidden(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 403 Forbidden result.
    
    static  	forbidden(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use forbidden() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.

    static  	forbidden(java.lang.String content):Result;
    // Generates a 403 Forbidden result.

    static  	forbidden(java.lang.String content, java.lang.String charset):Result;
    // Generates a 403 Forbidden result.

    static  	found(Call call):Result;
    // Generates a 302 Found result.

    static  	found(java.lang.String url):Result;
    // Generates a 302 Found result.

    static  	internalServerError():StatusHeader;
    // Generates a 500 Internal Server Error result.
    
    static  	internalServerError(byte[] content):Result;
    // Generates a 500 Internal Server Error result.

    static  	internalServerError(play.twirl.api.Content content):Result;
    // Generates a 500 Internal Server Error result.

    static  	internalServerError(play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a 500 Internal Server Error result.
    
    static  	internalServerError(java.io.File content):Result;
    // Generates a 500 Internal Server Error result.
    
    static  	internalServerError(java.io.File content, boolean inline):Result;
    // Generates a 500 Internal Server Error result.
    
    static  	internalServerError(java.io.File content, java.lang.String filename):Result;
    // Generates a 500 Internal Server Error result.

    static  	internalServerError(java.io.InputStream content):Result;
    // Generates a 500 Internal Server Error result.
    
    static  	internalServerError(java.io.InputStream content, long contentLength):Result;
    // Generates a 500 Internal Server Error result.

    static  	internalServerError(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 500 Internal Server Error result.
    
    static  	internalServerError(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 500 Internal Server Error result.
    
    static  	internalServerError(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 500 Internal Server Error result.

    static  	internalServerError(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use internalServerError() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.
    
    static  	internalServerError(java.lang.String content):Result;
    // Generates a 500 Internal Server Error result.

    static  	internalServerError(java.lang.String content, java.lang.String charset):Result;
    // Generates a 500 Internal Server Error result.

    static  	movedPermanently(Call call):Result;
    // Generates a 301 Moved Permanently result.

    static  	movedPermanently(java.lang.String url):Result;
    // Generates a 301 Moved Permanently result.

    static  	noContent():StatusHeader;
    // Generates a 204 No Content result.

    static  	notFound():StatusHeader;
    // Generates a 404 Not Found result.

    static  	notFound(byte[] content):Result;
    // Generates a 404 Not Found result.

    static  	notFound(play.twirl.api.Content content):Result;
    // Generates a 404 Not Found result.

    static  	notFound(play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a 404 Not Found result.

    static  	notFound(java.io.File content):Result;
    // Generates a 404 Not Found result.

    static  	notFound(java.io.File content, boolean inline):Result;
    // Generates a 404 Not Found result.

    static  	notFound(java.io.File content, java.lang.String filename):Result;
    // Generates a 404 Not Found result.
    
    static  	notFound(java.io.InputStream content):Result;
    // Generates a 404 Not Found result.

    static  	notFound(java.io.InputStream content, long contentLength):Result;
    // Generates a 404 Not Found result.

    static  	notFound(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 404 Not Found result.

    static  	notFound(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 404 Not Found result.

    static  	notFound(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 404 Not Found result.

    static  	notFound(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use notFound() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.

    static  	notFound(java.lang.String content):Result;
    // Generates a 404 Not Found result.
    
    static  	notFound(java.lang.String content, java.lang.String charset):Result;
    // Generates a 404 Not Found result.

    static  	ok():StatusHeader;
    // Generates a 200 OK result.

    static  	ok(byte[] content):Result;
    // Generates a 200 OK result.

    static  	ok(play.twirl.api.Content content):Result;
    // Generates a 200 OK result.

    static  	ok(play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a 200 OK result.

    static  	ok(java.io.File content):Result;
    // Generates a 200 OK result.

    static  	ok(java.io.File content, boolean inline):Result;
    // Generates a 200 OK result.

    static  	ok(java.io.File content, java.lang.String filename):Result;
    // Generates a 200 OK result.

    static  	ok(java.io.InputStream content):Result;
    // Generates a 200 OK result.

    static  	ok(java.io.InputStream content, long contentLength):Result;
    // Generates a 200 OK result.

    static  	ok(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 200 OK result.

    static  	ok(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 200 OK result.

    static  	ok(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 200 OK result.

    static  	ok(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use ok() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.
    
    static  	ok(java.lang.String content):Result;
    // Generates a 200 OK result.

    static  	ok(java.lang.String content, java.lang.String charset):Result;
    // Generates a 200 OK result.
    
    static  	paymentRequired():StatusHeader;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(byte[] content):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(play.twirl.api.Content content):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(java.io.File content):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(java.io.File content, boolean inline):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(java.io.File content, java.lang.String filename):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(java.io.InputStream content):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(java.io.InputStream content, long contentLength):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(Results.Chunks<?> chunks):Result;
    // Deprecated. 
    // Use paymentRequired() with StatusHeader.chunked(akka.stream.javadsl.Source) instead.
    
    static  	paymentRequired(java.lang.String content):Result;
    // Generates a 402 Payment Required result.

    static  	paymentRequired(java.lang.String content, java.lang.String charset):Result;
    // Generates a 402 Payment Required result.

    static  	permanentRedirect(Call call):Result;
    // Generates a 308 Permanent Redirect result.

    static  	permanentRedirect(java.lang.String url):Result;
    // Generates a 308 Permanent Redirect result.

    static  	redirect(Call call):Result;
    // Generates a 303 See Other result.

    static  	redirect(java.lang.String url):Result;
    // Generates a 303 See Other result.

    static  	seeOther(Call call):Result;
    // Generates a 303 See Other result.

    static  	seeOther(java.lang.String url):Result;
    // Generates a 303 See Other result.

    static  	status(int status):StatusHeader;
    // Generates a simple result.

    static  	status(int status, byte[] content):Result;
    // Generates a simple result with byte-array content.

    static  	status(int status, akka.util.ByteString content):Result;
    // Generates a simple result.

    static  	status(int status, play.twirl.api.Content content):Result;
    // Generates a simple result.

    static  	status(int status, play.twirl.api.Content content, java.lang.String charset):Result;
    // Generates a simple result.

    static  	status(int status, java.io.File content):Result;
    // Generates a result with file contents.

    static  	status(int status, java.io.File content, boolean inline):Result;
    // Generates a result with file content.

    static  	status(int status, java.io.File content, java.lang.String fileName):Result;
    // Generates a result.

    static  	status(int status, java.io.InputStream content):Result;
    // Generates a chunked result.

    static  	status(int status, java.io.InputStream content, long contentLength):Result;
    // Generates a chunked result.

    static public function status(int status, com.fasterxml.jackson.databind.JsonNode content):Result;
    // Generates a simple result with json content and UTF8 encoding.

    static public function status(int status, com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    // Generates a simple result with json content.

    static public function status(int status, com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    // Generates a simple result with json content.

    static public function status(int status, Results.Chunks<?> chunks):Result;
    static public function status(int status, java.lang.String content):Result;
    // Generates a simple result.
    
    static public function status(int status, java.lang.String content, java.lang.String charset):Result;
    // Generates a simple result.
    
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
