
package play.mvc.bodyparser;

// Parse the body as Xml without checking the Content-Type.
class	TolerantXml {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
