
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
    public function entrySet():Set<Entry<String, ConfigValue>>{}
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
    public function getObjectList(key:String, ?defaultList:List<Map<String, Dynamic>>):List<Map<String, Dynamic>>{}
    public function getString(key:String, ?defaultString:String):String{}
    public function getStringList(key:String, ?defaultList:java.util.List<java.lang.String>):List<String>{}
    public function getWrappedConfiguration() :Configuration{}
    public function keys():Set<String>{}
    static public function load( env:Environment):Configuration{}
    static public function reference():Configuration{}
    public function reportError(key:String, message:String, e:Throwable):RuntimeException{}
    static public function root():Configuration{}
    public function subKeys():Set<String>{}
    public function underlying():Config{}
    public function withFallback(fallback:Configuration):Configuration{}
}
