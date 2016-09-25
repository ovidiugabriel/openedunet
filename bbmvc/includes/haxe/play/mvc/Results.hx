
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
    @:overload(function(content:Content, ?charset:String):Result{})
    @:overload(function(content:File, ?isInline:Bool):Result{})
    @:overload(function(content:File, filename:String):Result{})
    @:overload(function(content:InputStream, ?contentLength:Int):Result{})
    @:overload(function(content:JsonNode, ?encoding:JsonEncoding):Result{})
    @:overload(function(content:JsonNode, charset:String):Result{})
    static public function badRequest(content:String, ?charset:String):Result {
        #if java
        #end
    }

    /**
        Generates a 201 Created result.
     **/
    @:overload(function():StatusHeader{})
    @:overload(function(content:haxe.io.Bytes):Result{})
    @:overload(function(content:Content, ?charset:String):Result{})
    @:overload(function(content:File, ?isInline:Bool):Result{})
    @:overload(function(content:File, filename:String):Result{})
    @:overload(function(content:InputStream, ?contentLength:Int):Result{})
    @:overload(function(content:JsonNode, ?encoding:JsonEncoding):Result{})
    @:overload(function(content:JsonNode, charset:String):Result{})
    static public function created(content:String, ?charset:String):Result {
        #if java
        #end
    }

    /**
        Generates a 403 Forbidden result.
     **/
    @:overload(function():StatusHeader{})
    @:overload(function(content:haxe.io.Bytes):Result{})
    @:overload(function(content:Content, ?charset:String):Result{})
    @:overload(function(content:File, ?isInline:Bool):Result{})
    @:overload(function(content:File, filename:String):Result{})
    @:overload(function(content:InputStream, ?contentLength:Int):Result{})
    @:overload(function(content:JsonNode, ?encoding:JsonEncoding):Result{})
    @:overload(function(content:JsonNode, charset:String):Result{})
    static public function forbidden(content:String, ?charset:String):Result {
        #if java
        #end
    }

    /**
        Generates a 302 Found result.
     **/
    @:overload(function(call:Call):Result{})
    static public function found(url:String):Result {
    }

    /** 
        Generates a 500 Internal Server Error result.
     **/
    @:overload(function():StatusHeader{})
    @:overload(function(content:haxe.io.Bytes):Result{})
    @:overload(function(content:Content, ?charset:String):Result{})
    @:overload(function(content:File, ?isInline:Bool):Result{})
    @:overload(function(content:File, filename:String):Result{})
    @:overload(function(content:InputStream, ?contentLength:Int):Result{})
    @:overload(function(content:JsonNode, ?encoding:JsonEncoding):Result{})
    @:overload(function(content:JsonNode, charset:String):Result{})
    @:overload(function(content:String):Result{})
    static public function internalServerError(content:String, charset:String):Result {
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
    static public function notFound(JsonNode content):Result;
    static public function notFound(JsonNode content, JsonEncoding encoding):Result;
    static public function notFound(JsonNode content,String charset):Result;
    static public function notFound(content:String):Result;   
    static public function notFound(String content, String charset):Result {
        #if java
        #end
    }
    
    /**
        Generates a 200 OK result.
     **/
    static public function ok():StatusHeader;
    static public function ok(byte[] content):Result;
    static public function ok(Content content):Result;
    static public function ok(Content content, String charset):Result;
    static public function ok(File content):Result;
    static public function ok(File content, boolean inline):Result;
    static public function ok(File content, java.lang.String filename):Result;
    static public function ok(InputStream content):Result;
    static public function ok(InputStream content, long contentLength):Result;
    static public function ok(JsonNode content):Result;
    static public function ok(JsonNode content, JsonEncoding encoding):Result;
    static public function ok(JsonNode content, String charset):Result;   
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
    static public function paymentRequired(Content content):Result;
    static public function paymentRequired(Content content, String charset):Result;
    static public function paymentRequired(File content):Result;
    static public function 	paymentRequired(File content, boolean inline):Result;
    static public function 	paymentRequired(File content, String filename):Result;
    static public function 	paymentRequired(InputStream content):Result;
    static public function 	paymentRequired(InputStream content, long contentLength):Result;
    static public function 	paymentRequired(JsonNode content):Result;
    static public function 	paymentRequired(JsonNode content, JsonEncoding encoding):Result;
    static public function 	paymentRequired(JsonNode content, charset:String):Result;   
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
    static public function status(status:Int, ByteString content):Result;
    static public function status(status:Int, Content content):Result;
    static public function status(status:Int, Content content,String charset):Result;
    static public function status(status:Int, File content):Result;
    static public function status(status:Int, File content, boolean inline):Result;
    static public function status(status:Int, File content, String fileName):Result;
    static public function status(status:Int, InputStream content):Result;
    static public function status(status:Int, InputStream content, long contentLength):Result;
    static public function status(status:Int, JsonNode content):Result;
    static public function status(status:Int, JsonNode content, JsonEncoding encoding):Result;
    static public function status(status:Int, JsonNode content, String charset):Result;
    static public function status(status:Int, content:String):Result;
    static public function status(status:Int, content:String, charset:String):Result {
        #if java
        #end        
    }
    
    /**
        Generates a 307 Temporary Redirect result.
     **/
    static public function temporaryRedirect(Call call):Result;
    static public function temporaryRedirect(String url):Result {
        #if java
        #end        
    }

    /**
        Generates a 401 Unauthorized result.
     **/
    static public function unauthorized():StatusHeader;
    static public function unauthorized(content:haxe.io.Bytes):Result;
    static public function unauthorized(Content content):Result;
    static public function unauthorized(Content content,String charset):Result;
    static public function unauthorized(File content):Result;
    static public function unauthorized(File content, boolean isInline):Result;
    static public function unauthorized(File content, String filename):Result;
    static public function unauthorized(InputStream content):Result;
    static public function unauthorized(InputStream content, long contentLength):Result;
    static public function unauthorized(JsonNode content):Result;
    static public function unauthorized(JsonNode content, JsonEncoding encoding):Result;
    static public function unauthorized(JsonNode content, String charset):Result;
    static public function unauthorized(String content):Result;
    static public function unauthorized(String content, String charset):Result {
        #if java
        #end
    }
    
}
