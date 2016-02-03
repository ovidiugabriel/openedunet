abstract SignedInt(Int) {

    inline public function new(i:Int) {
        this = i;
    }

    @:op(A + B)
    inline public function add(rvalue:Int):SignedInt {
        return new SignedInt(this + rvalue);
    }

    @:op(A - B)
    inline public function sub(rvalue:Int):SignedInt {
        return new SignedInt(this - rvalue);
    }

    @:op(A * B)
    inline public function mul(rvalue:Int):SignedInt {
        return new SignedInt(this * rvalue);
    }

    @:op(A / B)
    inline public function div(rvalue:Int):SignedInt {
        return new SignedInt(Std.int(this / rvalue));
    }

    @:op(A % B)
    inline public function mod(rvalue:Int):SignedInt {
        return new SignedInt(this % rvalue);
    }

    @:from
    inline static public function fromInt(value:Int):SignedInt {
        return new SignedInt(value);
    }

    @:to
    inline public function toInt():Int {
        return this;
    }
/*
    @:from
    static public function fromUnsignedInt(value:UnsignedInt):SignedInt {

    }
    @:to
    static public function toUnsignedInt():UnsignedInt {

    }
*/
    static public function getMax():Int {
        return Limits.getIntMax();
    }
}
