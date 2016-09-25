
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
    @:overload(function(call:Call):Result{})
    static public function seeOther(url:String):Result {
        #if java
        #end        
    }

    /**
        Generates a simple result.
     **/
    @:overload(function(status:Int):StatusHeader{})
    @:overload(function(status:Int, content:haxe.io.Bytes):Result{})
    @:overload(function(status:Int, content:ByteString):Result{})
    @:overload(function(status:Int, content:Content, ?charset:String):Result{})
    @:overload(function(status:Int, content:File, ?isInline:Bool):Result{})
    @:overload(function(status:Int, content:File, fileName:String):Result{})
    @:overload(function(status:Int, content:InputStream, ?contentLength:Int):Result{})
    @:overload(function(status:Int, content:JsonNode, ?encoding:JsonEncoding):Result{})
    @:overload(function(status:Int, content:JsonNode, charset:String):Result{})
    static public function status(status:Int, content:String, ?charset:String):Result {
        #if java
        #end        
    }
    
    /**
        Generates a 307 Temporary Redirect result.
     **/
    @:overload(function(call:Call):Result{})
    static public function temporaryRedirect(url:String):Result {
        #if java
        #end        
    }

    /**
        Generates a 401 Unauthorized result.
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
    static public function unauthorized(content:String, ?charset:String):Result {
        #if java
        #end
    }
    
}
