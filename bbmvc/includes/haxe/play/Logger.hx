
class Logger {
    public function new() {}
    static public 
    static public 
    
    @:overload(function (String message:String):Void{})
    @:overload(function (message:String, .. args):Void{})
    static public function debug(message:String, error:Throwable):Void{}
    
    @:overload(function (message:String):Void{})
    @:overload(function (message:String, j... args):Void{})
    static public function error(message:String, error:Throwable):Void{}
    
    @:overload(function (message:String):Void{})
    @:overload(function (message:String, ... args):Void{})
    static public function info(message:String, error:Throwable):Void{}
    
    static public function isDebugEnabled():Bool{}
    static public function isErrorEnabled():Bool{}
    static public function isInfoEnabled():Bool{}
    static public function isTraceEnabled():Bool{}
    static public function isWarnEnabled():Bool{}
    
    @:overload(function (clazz:Class):ALogger{})
    static of(name:String):ALogger{}
    
    @:overload(function (message:String):Void{})
    @:overload(function (message:String, ... args):Void{})
    static public function trace(message:String, error:Throwable):Void{}
    
    static underlying():Logger{}
    
    @:overload(function(message:String):Void{})
    @:overload(function(message:String, ... args):Void{})
    static warn(message:String, error:Throwable):Void{}

}
