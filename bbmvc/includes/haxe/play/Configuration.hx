
// See: https://www.playframework.com/documentation/2.5.x/api/java/play/Configuration.html
import haxe.io.Bytes;

class Configuration {
    @:overload(function(conf:Config){})
    @:overload(function(conf:Configuration){})
    @:overload(function(conf:Map<String, Dynamic>){})
    @:overload(function(s:String){})
    public function new() {}    
    public function asMap():Map<String, Dynamic> {}
    static public function empty():Configuration {}
    public function entrySet():Set {}
    public function getBoolean(key:String, ?defaultBoolean:Bool):Bool {}   
    public function getBooleanList(key:String, ?defaultList:List<Bool>):List<Bool> {}   
    public function getBytes(key:String, ?defaultBytes:Bytes):Bytes {}
    public function getBytesList(key:String, ?defaultList:List<Bytes>):List<Bytes> {}   
    public function getConfig(java.lang.String key):Configuration {}
    public function getConfigList(key:String, ?defaultList:List<Configuration>):List<Configuration> {}
    public function getDouble(key:String, ?defaultDouble:Float):Float {}    
    public function getDoubleList(key:String, ?defaultList:List<Double>):List<Float>{}   
    public function getInt(key:String, ?defaultInteger:Int):Int {}
    public function getIntList(key:String, ?defaultList:List<Int>):List<Int>{}   
    public function getList(key:String, defaultList:List<Dynamic>):List<Dynamic>{}  
    
    // Java: The long data type is a 64-bit two's complement integer.
    public function getLong(key:String, defaultLong:Int64):Int64{}
    public function getLongList(key:String, ?defaultList:List<Int64>):List<Int64>{}    
    
    public function getMilliseconds(key:String, ?defaultMilliseconds:Int64):Int64 {}	
    public function getMillisecondsList(key:String, ?defaultList:List<Int64>):List<Int64>{}

    public function getNanoseconds(key:String, ?defaultNanoseconds:Int64):Int64 {}
    public function getNanosecondsList(key:String, ?defaultList:Int64):List<Int64>{}

    public function getNumber(key:String, ?defaultNumber:Number):Number{}
    public function getNumberList(key:String, ?defaultList:List<Number>):java.util.List<java.lang.Number>{}
    public function getObject(key:String, ?defaultObject:Dynamic):Dynamic {}
/*
        // Retrieves a configuration value as a Object.
    java.util.List<java.util.Map<java.lang.String,java.lang.Object>>	getObjectList(java.lang.String key)
    // Retrieves a configuration value as a List<Map<String, Object>>.
    java.util.List<java.util.Map<java.lang.String,java.lang.Object>>	getObjectList(java.lang.String key, java.util.List<java.util.Map<java.lang.String,java.lang.Object>> defaultList)
    // Retrieves a configuration value as a List<Map<String, Object>>.
    java.lang.String	getString(java.lang.String key)
    // Retrieves a configuration value as a String.
    java.lang.String	getString(java.lang.String key, java.lang.String defaultString)
    // Retrieves a configuration value as a String.
    java.util.List<java.lang.String>	getStringList(java.lang.String key)
    // Retrieves a configuration value as a List<String>.
    java.util.List<java.lang.String>	getStringList(java.lang.String key, java.util.List<java.lang.String> defaultList)
    // Retrieves a configuration value as a List<Number>.
    play.api.Configuration	getWrappedConfiguration() 
    java.util.Set<java.lang.String>	keys()
    // Retrieves the set of keys available in this configuration.
    static Configuration	load(Environment env)
    // Load a new configuration from an environment.
    static Configuration	reference()
    // A new reference configuration.
    java.lang.RuntimeException	reportError(java.lang.String key, java.lang.String message, java.lang.Throwable e)
    // Creates a configuration error for a specific configuration key.
    static Configuration	root()
    // The root configuration.
    java.util.Set<java.lang.String>	subKeys()
    // Retrieves the set of direct sub-keys available in this configuration.
    com.typesafe.config.Config	underlying()
    // Returns the underlying Typesafe config object.
    Configuration	withFallback(Configuration fallback)
    // Extend this configuration with fallback configuration.
*/
}
