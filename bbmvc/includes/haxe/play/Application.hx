
// See: https://www.playframework.com/documentation/2.5.x/api/java/play/Application.html

interface Application {
    public function classloader():ClassLoader;
    public function configuration():Configuration;
    public function getFile(relativePath:String):File;
    public function getWrappedApplication():Application;
    public function injector():Injector;
    public function isDev():Bool;
    public function isProd():Bool;
    public function isTest():Bool;
    public function path():File;
    public function resource(relativePath:String):URL;
    public function resourceAsStream(java.lang.String relativePath:String):InputStream;
}
