
package play.mvc;

import play.api.mvc.ResponseHeader;

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
