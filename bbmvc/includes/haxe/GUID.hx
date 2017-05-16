
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
}
