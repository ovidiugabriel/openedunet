
// See: https://www.playframework.com/documentation/2.5.x/api/java/play/Environment.html

class Environment {  
    @:overload(function(environment:Environment){})
    @:overload(function(rootPath:File){})
    @:overload(function(rootPath:File, classLoader:ClassLoader, mode:Mode){})
    @:overload(function(rootPath:File, mode:Mode){})
    public function new(mode:Mode) {}
  
    public function classLoader():ClassLoader{}
    public function getFile(relativePath:String):File{}
    public function isDev():Bool{}
    public function isProd():Bool{}
    public function isTest():Bool{}
    public function mode():Mode{}
    public function resource(relativePath:String):URL{}
    public function resourceAsStream(relativePath:String):InputStream{}
    public function rootPath():File{}
    static public function simple():Environment{}
    public function underlying():Environment{}
}
