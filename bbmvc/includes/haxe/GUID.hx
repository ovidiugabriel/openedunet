
// Compile this using:
//      HAXE_STD_PATH=/opt/haxe/std haxe -main GuidTestMain GUID -php phpoutput
//

import haxe.crypto.Md5;

/** 
 * Example: "4cebcee1-76cb-47d5-8e4e-2c216d432606"
 *  
 *  Data1: 0x4cebcee1
 *  Data2: 0x76cb
 *  Data3: 0x47d5
 *  Data4: [0x8e, 0x4e, 0x2c, 0x21, 0x6d, 0x43, 0x26, 0x06]
 */
abstract GUID(String) {
    public var Data1(get, never):Int;
    public var Data2(get, never):Int;
    public var Data3(get, never):Int;
    public var Data4(get, never):Array<Int>;  
    
    public var Data1Hex(get, never):String;
    public var Data2Hex(get, never):String;
    public var Data3Hex(get, never):String;
    public var Data4Hex(get, never):Array<String>;
    
    /** 
     * Stores the GUID value. 
     * Usually this is the single operation we use, except GUID.create()
     * that's why no need to parse the string.
     */
    @:extern
    inline public function new(value : String) {
        this = value;
    }
    
    /**
     * Returns the first 8 hexadecimal digits of the GUID.
     */
    @:extern
    inline public function get_Data1():Int {
        return hexInt(this.split('-')[0]);
    }
    
    /** 
     * Returns hexadecimal value as string without '0x' prefix.
     */
    @:extern
    inline public function get_Data1Hex():String {
        return this.split('-')[0];
    }
       
    /**
     * Returns the first group of 4 hexadecimal digits.
     */
    @:extern
    inline public function get_Data2():Int {
        return hexInt(this.split('-')[1]);
    }

    /** 
     * Returns hexadecimal value as string without '0x' prefix.
     */
    @:extern
    inline public function get_Data2Hex():String {
        return this.split('-')[1];
    }
    
    /**
     * Returns the second group of 4 hexadecimal digits.
     */
    @:extern
    inline public function get_Data3():Int {
        return hexInt(this.split('-')[2]);
    }

    /** 
     * Returns hexadecimal value as string without '0x' prefix.
     */
    @:extern
    inline public function get_Data3Hex():String {
        return this.split('-')[2];
    }
    
    /**
     * Array of 8 bytes. 
     * The first 2 bytes contain the third group of 4 hexadecimal digits. 
     * The remaining 6 bytes contain the final 12 hexadecimal digits.
     */
    @:extern
    inline public function get_Data4():Array<Int> {
        var result = new Array<Int>();
    
        var d = this.split('-');
        for (i in 0...2) {
            result[i] = hexInt(d[3].substr(i*2, 2));
        }

        for (i in 0...6) {
            result[i+2] = hexInt(d[4].substr(i*2, 2));
        }        
        return result;
    }
    
    /** 
     * Returns an array with two hexadecimal value as strings without '0x' prefix.
     * The first one is the third group of 4 hexadecimal digits.
     * The second one contains the final 12 hexadecimal digits.
     */
    @:extern
    inline public function get_Data4Hex():Array<String> {
        var result = new Array<String>();
        var d = this.split('-');
        result[0] = d[3];
        result[1] = d[4];
        return result;
    }
    
    @:extern
    inline static private function hexInt(value:String):Int {
        return Std.parseInt('0x' + value);
    }
        
    @:exern
    inline public function toByteArray():Array<Int> {
        var result = new Array<Int>();     

        // the first 4 bytes of the GUID.
        var d = this.split('-');
        result[0] = hexInt(d[0].substr(0, 2));
        result[1] = hexInt(d[0].substr(2, 2));
        result[2] = hexInt(d[0].substr(4, 2));
        result[3] = hexInt(d[0].substr(6, 2));

        // the first group of 2 bytes of the GUID
        result[4] = hexInt(d[1].substr(0, 2));
        result[5] = hexInt(d[1].substr(2, 2));
        
        // the second group of 2 bytes of the GUID

        result[6] = hexInt(d[2].substr(0, 2));
        result[7] = hexInt(d[2].substr(2, 2));

        var i:Int = 7;
        for (val in cast(this, GUID).Data4) {
            result[i] = val;
            i++;
        }
        return result;
    }
    
    /** 
     * Creates a new instance of GUID structure.
     * If you want to use curly braces, append them yourself.
     */
    static public function create():GUID {
        var uniqueId:String;
        
        #if php
        untyped __php__('mt_srand((double)microtime()*10000)'); //optional for php 4.2.0 and up.
        uniqueId = untyped __php__('uniqid(rand(), true)');
        #end
        
        var charid = Md5.encode(uniqueId).toUpperCase();        
        var uuid = charid.substr(0, 8) + '-'
                 + charid.substr(8, 4) + '-'
                 + charid.substr(12, 4) + '-'
                 + charid.substr(16, 4) + '-'
                 + charid.substr(20, 12);
        return new GUID(uuid);
    }
    
    @:extern
    inline private static function hexDigits(n) {
        return '[0-9A-Fa-f]{' + Std.string(n) + '}';
    }
    
    /** 
     * Checks if the given object is a valid GUID.
     * If null provided, it is not considered a valid GUID. 
     * When you need to include null values also, please use GUID.isValidOrNull()
     */
    @:overload(function (id: GUID): Bool{})
    static public function isValid(id: String): Bool {
        var idFormat = hexDigits(8) + '-'
            + hexDigits(4) + '-'
            + hexDigits(4) + '-'
            + hexDigits(4) + '-'
            + hexDigits(12);
        
        var regex = new EReg("^" + idFormat + "$");
        return regex.match(id);
    }
    
    /**
     * Checks if the given object is null or is a valid GUID.
     */
    @:overload(function (id:Null<GUID>):Bool{})
    static public function isValidOrNull(id:Null<String>):Bool {    
        //
        // In case of PHP target
        // Haxe automatically generates triple-equal operator for comparison with null
        //
        return null == id || GUID.isValid(id);
    }
}
