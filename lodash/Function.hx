
package lodash;

@:callable
abstract Function(Dynamic) from Dynamic {
    public var cache(get, never) : Dynamic;

    public function get_cache() : Dynamic {
        return this.cache;
    }

    @:from
    public function new(value: Dynamic) {
        this = value;
    }

    /**
        This will inline the call to the extern object
        (it is not performing a recursive call)
    **/
    @:extern
    inline public function cancel() {
        return this.cancel();
    }
}
