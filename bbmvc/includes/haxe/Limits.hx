
/**
 * http://www.cplusplus.com/reference/climits/
 */
#if cpp
@:headerCode("#include <limits.h>")
#end
class Limits {
    /** 
     * Returns number of bytes used to store an integer.
     * Integers may be on 32-bits or 64-bits, so the result can be 4 or 8 bytes.
     */
    static public function getSizeOfInt():Int {
        // 
        #if php        
        return untyped __php__('strlen(dechex(PHP_INT_MAX))/2');
        #end

        #if cpp
        return untyped __cpp__('sizeof(INT_MAX)');
        #end
    }

    static public function getIntMax():Int {
        #if php
        return untyped __php__('PHP_INT_MAX');
        #end

        #if cpp
        return untyped __cpp__('INT_MAX');
        #end
    }
}
