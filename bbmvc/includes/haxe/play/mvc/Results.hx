
package play.mvc;

/** 
 * @see https://www.playframework.com/documentation/2.5.x/api/java/play/mvc/Results.html
 */
class Results {
    /**
        Generates a 400 Bad Request result.
     **/
    @:overload(function():StatusHeader{})
    @:overload(function(content:haxe.io.Bytes):Result{})
    @:overload(function(content:Content):Result{})
    @:overload(function(content:Content, charset:String):Result{})
    @:overload(function(content:File):Result{})
    @:overload(function(content:File, isInline:Bool):Result{})
    @:overload(function(content:File, filename:String):Result{})
    @:overload(function(content:InputStream):Result{})
    @:overload(function(content:InputStream, contentLength:Int):Result{})
    @:overload(function(content:JsonNode):Result{})
    @:overload(function(content:JsonNode, encoding:JsonEncoding):Result{})
    @:overload(function(content:JsonNode, charset:String):Result{})
    @:overload(function(content:String):Result{})
    static public function badRequest(content:String, charset:String):Result {
        #if java
        #end
    }

    /**
        Generates a 201 Created result.
     **/
    @:overload(function():StatusHeader{})
    @:overload(function(content:haxe.io.Bytes):Result{})
    @:overload(function(content:Content):Result{})
    @:overload(function(content:Content, charset:String):Result{})
    @:overload(function(content:File):Result{})
    @:overload(function(content:File, isInline:Bool):Result{})
    @:overload(function(content:File, filename:String):Result{})
    @:overload(function(content:InputStream):Result{})
    @:overload(function(content:InputStream, contentLength:Int):Result{})
    @:overload(function(content:JsonNode):Result{})
    @:overload(function(content:JsonNode, encoding:JsonEncoding):Result{})
    @:overload(function(content:JsonNode, charset:String):Result{})
    @:overload(function(content:String):Result{})
    static public function created(content:String, charset:String):Result {
        #if java
        #end
    }

    /**
        Generates a 403 Forbidden result.
     **/
    static public function forbidden():StatusHeader;
    static public function forbidden(byte[] content):Result;
    static public function forbidden(play.twirl.api.Content content):Result;
    static public function forbidden(play.twirl.api.Content content, java.lang.String charset):Result;
    static public function forbidden(java.io.File content):Result;
    static public function forbidden(java.io.File content, boolean inline):Result;
    static public function forbidden(java.io.File content, java.lang.String filename):Result;
    static public function forbidden(java.io.InputStream content):Result;
    static public function forbidden(java.io.InputStream content, long contentLength):Result;
    static public function forbidden(com.fasterxml.jackson.databind.JsonNode content):Result;
    static public function forbidden(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    static public function forbidden(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    static public function forbidden(java.lang.String content):Result;
    static public function forbidden(java.lang.String content, java.lang.String charset):Result {
        #if java
        #end
    }

    static public function found(Call call):Result;
    // Generates a 302 Found result.

    static public function found(java.lang.String url):Result {
    }

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

    static public function internalServerError(java.lang.String content, java.lang.String charset):Result {
    }

    static public function movedPermanently(Call call):Result;
    // Generates a 301 Moved Permanently result.

    static public function movedPermanently(java.lang.String url):Result {
        #if java
        #end
    }

    // Generates a 204 No Content result.
    static public function noContent():StatusHeader {}
    

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
    
    static public function notFound(java.lang.String content, java.lang.String charset):Result {
        #if java
        #end
    }
    

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

    static public function ok(content:String, charset:String):Result {
        #if java
        #end
    }
    
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

    static public function 	paymentRequired(content:String, charset:String):Result {
        #if java
        #end
    }

    static public function 	permanentRedirect(Call call):Result;
    // Generates a 308 Permanent Redirect result.

    static public function 	permanentRedirect(url:String):Result {
        #if java
        #end        
    }

    static public function 	redirect(Call call):Result;
    // Generates a 303 See Other result.

    static public function 	redirect(url:String):Result {
    }

    static public function 	seeOther(Call call):Result;
    // Generates a 303 See Other result.

    static public function 	seeOther(url:String):Result {
        #if java
        #end        
    }

    /**
        Generates a simple result.
     **/
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
    

    static public function status(status:Int, content:String, charset:String):Result {
        #if java
        #end        
    }
    
    
    static public function temporaryRedirect(Call call):Result;
    // Generates a 307 Temporary Redirect result.

    static public function temporaryRedirect(java.lang.String url):Result {
        #if java
        #end        
    }

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
    static public function unauthorized(java.lang.String content, java.lang.String charset):Result {
        #if java
        #end
    }
    
}
