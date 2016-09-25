
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
    static public function internalServerError(content:String, ?charset:String):Result {
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
    @:overload(function():StatusHeader{})
    @:overload(function(content:haxe.io.Bytes):Result{})
    @:overload(function(content:Content):Result{})
    @:overload(function(content:Content, charset:String):Result{})
    @:overload(function(content:File, ?isInline:Bool):Result{})
    @:overload(function(content:File, filename:String):Result{})
    @:overload(function(content:InputStream, ?contentLength:Int):Result{})
    @:overload(function(content:JsonNode, ?encoding:JsonEncoding):Result{})
    @:overload(function(content:JsonNode, charset:String):Result{})
    static public function notFound(content:String, ?charset:String):Result {
        #if java
        #end
    }
    
    /**
        Generates a 200 OK result.
     **/
    @:overload(function():StatusHeader{})
    @:overload(function(content:haxe.io.Bytes):Result{})
    @:overload(function(content:Content, ?charset:String):Result{})
    @:overload(function(content:File, ?isInline:Bool):Result{})
    @:overload(function(content:File, filename:String):Result{})
    @:overload(function(content:InputStream, ?contentLength:Int):Result{})
    @:overload(function(content:JsonNode, ?encoding:JsonEncoding):Result{})
    @:overload(function(content:JsonNode, charset:String):Result{})
    static public function ok(content:String, ?charset:String):Result {
        #if java
        #end
    }
    
    /**
        Generates a 402 Payment Required result.
     **/
    @:overload(function():StatusHeader{})
    @:overload(function(content:haxe.io.Bytes):Result{})
    @:overload(function(content:Content, ?charset:String):Result{})
    @:overload(function(content:File, ?isInline:Bool):Result{})
    @:overload(function(content:File, filename:String):Result{})
    @:overload(function(content:InputStream, ?contentLength:Int):Result{})
    @:overload(function(content:JsonNode, ?encoding:JsonEncoding):Result{})
    @:overload(function(content:JsonNode, charset:String):Result{})
    static public function paymentRequired(content:String, ?charset:String):Result {
        #if java
        #end
    }

    /**
        Generates a 308 Permanent Redirect result.
     **/
    @:overload(function(call:Call):Result{})
    static public function permanentRedirect(url:String):Result {
        #if java
        #end        
    }

    /**
        Generates a 303 See Other result.
     **/
    @:overload(function(call:Call):Result{})
    static public function redirect(url:String):Result {
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
