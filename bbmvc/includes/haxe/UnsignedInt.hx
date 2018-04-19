//
// To satisfy Carnegie Mellon University Software Engineering Institute
// CERT C Coding Standard
// Rule INT14-C. Avoid performing bitwise and arithmetic operations on the same data
// 

abstract UnsignedInt(Int) {
    inline public function new(i:Int) {
        this = i;
    }

    @:op(A & B)
    inline public function and(rvalue:Int):UnsignedInt {
        return new UnsignedInt(this & rvalue);
    }

    @:op(A | B)
    inline public function or(rvalue:Int):UnsignedInt {
        return new UnsignedInt(this | rvalue);
    }

    @:op(A ^ B)
    inline public function xor(rvalue:Int):UnsignedInt {
        return new UnsignedInt(this ^ rvalue);
    }

    @:op(~A)
    inline public function not():UnsignedInt {
        return new UnsignedInt(~this);
    }

    @:op(A << B)
    inline public function shl(rvalue:Int):UnsignedInt {
        return new UnsignedInt(this << rvalue);
    }

    @:op(A >> B)
    inline public function shr(rvalue:Int):UnsignedInt {
        return new UnsignedInt(this >> rvalue);
    }

    @:from
    inline static public function fromInt(value:Int):UnsignedInt {
        return new UnsignedInt(value);
    }

    @:to
    inline public function toInt():Int {
        return this;
    }
/*
    @:from
    static public function fromSignedInt(value:SignedInt):UnsignedInt {

    }
*/
/*
    @:to
    static public function toSignedInt():SignedInt {

    }
*/
/*
    static public function getMax():Int {
    }
    */
}
