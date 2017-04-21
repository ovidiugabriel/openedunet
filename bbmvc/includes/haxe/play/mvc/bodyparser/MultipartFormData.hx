
package play.mvc.bodyparser;

// Parse the body as multipart form-data without checking the Content-Type.
class MultipartFormData {
    @:overload(function(httpConfiguration:HttpConfiguration, errorHandler:HttpErrorHandler) {})
    public function new(maxLength:Int64, errorHandler:HttpErrorHandler) {}
}
