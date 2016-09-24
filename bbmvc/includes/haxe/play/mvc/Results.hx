
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

    /**
        Generates a 302 Found result.
     **/
    static public function found(Call call):Result;
    static public function found(java.lang.String url):Result {
    }

    /** 
        Generates a 500 Internal Server Error result.
     **/
    static public function internalServerError():StatusHeader;
    static public function internalServerError(byte[] content):Result;
    static public function internalServerError(play.twirl.api.Content content):Result;
    static public function internalServerError(play.twirl.api.Content content, java.lang.String charset):Result;
    static public function internalServerError(java.io.File content):Result;
    static public function internalServerError(java.io.File content, boolean inline):Result;
    static public function internalServerError(java.io.File content, java.lang.String filename):Result;
    static public function internalServerError(java.io.InputStream content):Result;
    static public function internalServerError(java.io.InputStream content, long contentLength):Result;
    static public function internalServerError(com.fasterxml.jackson.databind.JsonNode content):Result;
    static public function internalServerError(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    static public function internalServerError(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;   
    static public function internalServerError(java.lang.String content):Result;
    static public function internalServerError(java.lang.String content, java.lang.String charset):Result {
        #if java
        #end
    }

    /**
        Generates a 301 Moved Permanently result.
     **/
    @:overload(function(call:Call):Result{})
    static public function movedPermanently(url:String):Result {
        #if java
        #end
    }

    /**
        Generates a 204 No Content result.
     **/
    static public function noContent():StatusHeader {
        #if java
        #end        
    }   
    
    /**
        Generates a 404 Not Found result.
     **/
    static public function notFound():StatusHeader;
    static public function notFound(byte[] content):Result;
    static public function notFound(play.twirl.api.Content content):Result;
    static public function notFound(play.twirl.api.Content content, java.lang.String charset):Result;
    static public function notFound(java.io.File content):Result;
    static public function notFound(java.io.File content, boolean inline):Result;
    static public function notFound(java.io.File content, java.lang.String filename):Result;
    static public function notFound(java.io.InputStream content):Result;
    static public function notFound(java.io.InputStream content, long contentLength):Result;
    static public function notFound(com.fasterxml.jackson.databind.JsonNode content):Result;
    static public function notFound(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    static public function notFound(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    static public function notFound(content:String):Result;   
    static public function notFound(java.lang.String content, java.lang.String charset):Result {
        #if java
        #end
    }
    
    /**
        Generates a 200 OK result.
     **/
    static public function ok():StatusHeader;
    static public function ok(byte[] content):Result;
    static public function ok(play.twirl.api.Content content):Result;
    static public function ok(play.twirl.api.Content content, java.lang.String charset):Result;
    static public function ok(java.io.File content):Result;
    static public function ok(java.io.File content, boolean inline):Result;
    static public function ok(java.io.File content, java.lang.String filename):Result;
    static public function ok(java.io.InputStream content):Result;
    static public function ok(java.io.InputStream content, long contentLength):Result;
    static public function ok(com.fasterxml.jackson.databind.JsonNode content):Result;
    static public function ok(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    static public function ok(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;   
    static public function ok(content:String):Result;
    static public function ok(content:String, charset:String):Result {
        #if java
        #end
    }
    
    /**
        Generates a 402 Payment Required result.
     **/
    static public function paymentRequired():StatusHeader;
    static public function paymentRequired(byte[] content):Result;
    static public function paymentRequired(play.twirl.api.Content content):Result;
    static public function paymentRequired(play.twirl.api.Content content, java.lang.String charset):Result;
    static public function paymentRequired(java.io.File content):Result;
    static public function 	paymentRequired(java.io.File content, boolean inline):Result;
    static public function 	paymentRequired(java.io.File content, java.lang.String filename):Result;
    static public function 	paymentRequired(java.io.InputStream content):Result;
    static public function 	paymentRequired(java.io.InputStream content, long contentLength):Result;
    static public function 	paymentRequired(com.fasterxml.jackson.databind.JsonNode content):Result;
    static public function 	paymentRequired(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    static public function 	paymentRequired(com.fasterxml.jackson.databind.JsonNode content, charset:String):Result;   
    static public function 	paymentRequired(content:String):Result;
    static public function 	paymentRequired(content:String, charset:String):Result {
        #if java
        #end
    }

    /**
        Generates a 308 Permanent Redirect result.
     **/
    static public function 	permanentRedirect(Call call):Result;
    static public function 	permanentRedirect(url:String):Result {
        #if java
        #end        
    }

    /**
        Generates a 303 See Other result.
     **/
    static public function 	redirect(Call call):Result;
    static public function 	redirect(url:String):Result {
        #if java
        #end        
    }

    /**
        Generates a 303 See Other result.
     **/
    static public function 	seeOther(Call call):Result;
    static public function 	seeOther(url:String):Result {
        #if java
        #end        
    }

    /**
        Generates a simple result.
     **/
    static public function status(status:Int):StatusHeader;
    static public function status(status:Int, byte[] content):Result;
    static public function status(status:Int, akka.util.ByteString content):Result;
    static public function status(status:Int, play.twirl.api.Content content):Result;
    static public function status(status:Int, play.twirl.api.Content content, java.lang.String charset):Result;
    static public function status(status:Int, java.io.File content):Result;
    static public function status(status:Int, java.io.File content, boolean inline):Result;
    static public function status(status:Int, java.io.File content, java.lang.String fileName):Result;
    static public function status(status:Int, java.io.InputStream content):Result;
    static public function status(status:Int, java.io.InputStream content, long contentLength):Result;
    static public function status(status:Int, com.fasterxml.jackson.databind.JsonNode content):Result;
    static public function status(status:Int, com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    static public function status(status:Int, com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    static public function status(status:Int, content:String):Result;
    static public function status(status:Int, content:String, charset:String):Result {
        #if java
        #end        
    }
    
    /**
        Generates a 307 Temporary Redirect result.
     **/
    static public function temporaryRedirect(Call call):Result;
    static public function temporaryRedirect(java.lang.String url):Result {
        #if java
        #end        
    }

    /**
        Generates a 401 Unauthorized result.
     **/
    static public function unauthorized():StatusHeader;
    static public function unauthorized(byte[] content):Result;
    static public function unauthorized(play.twirl.api.Content content):Result;
    static public function unauthorized(play.twirl.api.Content content, java.lang.String charset):Result;
    static public function unauthorized(java.io.File content):Result;
    static public function unauthorized(java.io.File content, boolean inline):Result;
    static public function unauthorized(java.io.File content, java.lang.String filename):Result;
    static public function unauthorized(java.io.InputStream content):Result;
    static public function unauthorized(java.io.InputStream content, long contentLength):Result;
    static public function unauthorized(com.fasterxml.jackson.databind.JsonNode content):Result;
    static public function unauthorized(com.fasterxml.jackson.databind.JsonNode content, com.fasterxml.jackson.core.JsonEncoding encoding):Result;
    static public function unauthorized(com.fasterxml.jackson.databind.JsonNode content, java.lang.String charset):Result;
    static public function unauthorized(java.lang.String content):Result;
    static public function unauthorized(java.lang.String content, java.lang.String charset):Result {
        #if java
        #end
    }
    
}
