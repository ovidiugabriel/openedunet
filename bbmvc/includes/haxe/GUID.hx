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
    
    @:extern
    inline public function new(value : String) {
        this = value;
    }
    
    /**
     * Returns the first 8 hexadecimal digits of the GUID.
     */
    @:extern
    inline public function get_Data1():Int {
        return Std.parseInt('0x' + this.split('-')[0]);
    }
    
    /**
     * Returns the first group of 4 hexadecimal digits.
     */
    @:extern
    inline public function get_Data2():Int {
        return Std.parseInt('0x' + this.split('-')[1]);
    }
    
    /**
     * Returns the second group of 4 hexadecimal digits.
     */
    @:extern
    inline public function get_Data3():Int {
        return Std.parseInt('0x' + this.split('-')[2]);
    }
    
    /**
     * Array of 8 bytes. 
     * The first 2 bytes contain the third group of 4 hexadecimal digits. 
     * The remaining 6 bytes contain the final 12 hexadecimal digits.
     */
    @:extern
    inline public function get_Data4():Array<Int> {
        var result = new Array<Int>();
    
        var lp = this.split('-')[3];
        for (i in 0...2) {
            result[i] = Std.parseInt('0x' + lp.substr(i*2, 2));
        }

        var rest = this.split('-')[4];
        for (i in 0...6) {
            result[i] = Std.parseInt('0x' + rest.substr(i*2, 2));
        }
        return result;
    }
    
    /** 
     * Creates a new instance of GUID structure.
     * If you want to use curly braces, append them yourself.
     */
    static public function create():GUID {
        var charid:String;
        
        #if php
        untyped __php__('mt_srand((double)microtime()*10000)'); //optional for php 4.2.0 and up.
        charid = untyped __php__('strtoupper(md5(uniqid(rand(), true)))');
        #end

        return new GUID(charid.substr(0, 8) + '-'
                 + charid.substr(8, 4) + '-'
                 + charid.substr(12, 4) + '-'
                 + charid.substr(16, 4) + '-'
                 + charid.substr(20, 12));
    }
    
    /** 
     * Checks if the given object is a valid GUID.
     * If null provided, it is not considered a valid GUID. 
     * When you need to include null values also, please use GUID.isValidOrNull()
     */
    @:overload(function (id:GUID):Bool{})
    static public function isValid(id:String):Bool {
    
        function hex_digits(n) {
            return '[0-9A-Fa-f]{' + Std.string(n) + '}';
        }
        var idFormat = hex_digits(8) + '-'
            + hex_digits(4) + '-'
            + hex_digits(4) + '-'
            + hex_digits(4) + '-'
            + hex_digits(12);
        
        #if php        
        return 0 != (untyped __call__('preg_match', '/^' + idFormat + '$/' , id));
        #end
    }
    
    /**
     * Checks if the given object is null or is a valid GUID.
     */
    @:overload(function (id:Null<GUID>):Bool{})
    static public function isValidOrNull(id:Null<String>):Bool {
        #if php
        return untyped __php__("null === $id") || GUID.isValid(id);
        #end
    }
}
