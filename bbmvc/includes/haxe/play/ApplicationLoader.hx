
// See: https://www.playframework.com/documentation/2.5.x/api/java/play/ApplicationLoader.html

@:final
class ApplicationLoader_Context {
    public function create(environment:Environment):ApplicationLoader_Context {}
    // create(Environment environment, java.util.Map<java.lang.String,java.lang.Object> initialSettings)
    public function environment():Environment {}
    public function initialConfiguration():Configuration {}
    public function underlying():play.api.ApplicationLoader_Context {}
    public function withConfiguration(initialConfiguration:Configuration):ApplicationLoader_Context {}
    public function withEnvironment(environment:Environment):ApplicationLoader_Context {}
}

interface ApplicationLoader {
    public function load(context:ApplicationLoader_Context):Application;
}
