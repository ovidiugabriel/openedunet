//
// To satisfy Carnegie Mellon University Software Engineering Institute
// CERT C Coding Standard
// Rule INT14-C. Avoid performing bitwise and arithmetic operations on the same data
// 

abstract UnsignedInt(Int) {
    inline public function new(i : Int) {
        this = i;
    }

    @:op(A & B)
    inline public function bitwiseAnd(rvalue : Int) : UnsignedInt {
        return new UnsignedInt(this & rvalue);
    }

    @:op(A | B)
    inline public function bitwiseOr(rvalue : Int) : UnsignedInt {
        return new UnsignedInt(this | rvalue);
    }

    @:op(A ^ B)
    inline public function bitwiseXor(rvalue : Int) : UnsignedInt {
        return new UnsignedInt(this ^ rvalue);
    }

    @:op(~A)
    inline public function bitwiseNot() : UnsignedInt {
        return new UnsignedInt(~this);
    }

    @:op(A << B)
    inline public function shiftLeft(rvalue : Int) : UnsignedInt {
        return new UnsignedInt(this << rvalue);
    }

    @:op(A >> B)
    inline public function shiftRight(rvalue : Int) : UnsignedInt {
        return new UnsignedInt(this >> rvalue);
    }

    @:from
    inline static public function fromInt(value : Int) : UnsignedInt {
        return new UnsignedInt(value);
    }

    @:to
    inline public function toInt() : Int {
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
