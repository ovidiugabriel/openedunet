
/** 
 * See: https://msdn.microsoft.com/en-us/library/windows/desktop/aa373931(v=vs.85).aspx
 */
abstract GUID(String) {
    public var Data1(get, default):haxe.Int32;          // DWORD
    public var Data2(get, default):haxe.Int32;          // WORD
    public var Data3(get, default):haxe.Int32;          // WORD
    public var Data4(get, default):haxe.io.UInt8Array;  // BYTE[8]
    
    public function get_Data1() : haxe.Int32 {
    }
}
