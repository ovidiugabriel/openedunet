
package play.mvc;

import play.api.mvc.ResponseHeader;

/** 
 * @see https://www.playframework.com/documentation/2.5.x/api/java/play/mvc/Result.html
 */
class Result  {
    @:overload(function(status:Int){})
    @:overload(function(status:Int, body:HttpEntity){})
    @:overload(function(status:Int, headers:StringMap){}) 
    @:overload(function(status:Int, headers:StringMap, body:HttpEntity){})
    @:overload(function(status:Int, reasonPhrase:String, headers:StringMap, body:HttpEntity){})
    public function new (header:ResponseHeader, body:HttpEntity) {
        #if java
        #end
    }
}
