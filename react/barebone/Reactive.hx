/*
 *  To be compiled with:
 *
 *      HAXE_STD_PATH=/opt/haxe/std /opt/haxe/haxe -js output/barebone/react.js barebone/Reactive.hx
 *
 *   https://github.com/ovidiugabriel/openedunet/blob/wiki/BareboneJS.md
 */
// 17.07.2015 - Started to use Matt Baker Reactive.js; written /react/barebone/Reactive.hx 
// to make reactive JavaScript programming available in HaXe code; 
 
package barebone;

import js.Browser;
import js.html.Console;
import js.html.Element;
import js.html.DOMElement;
import haxe.ds.StringMap;
import haxe.extern.Rest;

@:expose('barebone')
class Js {

    private function new() {}

    /**
     * Advantage: Automatically detects if .val() or .text() method shall be
     * called depending on the node type;
     */
    static public function setValue(id:String, value:Dynamic):Void {
        var element:Element = Browser.document.getElementById(id);
        if (null !=  untyped __js__('element.value')) {
            untyped __js__('element.value = value');
        } else {
            element.textContent = value;
        }
    }

    /**
     * Advantage: Automatically detects if .val() or .text() method shall be
     * called depending on the node type;
     */
    static public function getValue(id:String):Dynamic {
        var element:Element = Browser.document.getElementById(id);
        if (null == element) {
            // TODO: Must thrown an exception??
            return null;
        }

        // `value` may a runtime property of `element` or not
        // this cannot be decided at compile-time
        if (null !=  untyped __js__('element.value')) {
            return untyped __js__('element.value');
        }
        return element.textContent;
    }

    /**
     * Automatically detects if value is not a number (integer or float) and
     * returns the defaultValue in that case.
     */
    static public function toFixed(value:Dynamic, decimals:Int, defaultValue:String):String {
        // avoid using Std.parseFloat because it generates a wrapper
        var num:Float = untyped __js__('parseFloat(value)');
        if (Math.isNaN(num)) { // always use isNaN(), do not compare with NaN
            return defaultValue;
        }
        return untyped __js__('num.toFixed(decimals)');
    }
    
    static public function getObjectByType(type:String):js.html.DOMElement {
        return untyped __js__('document.querySelector(\'object[type="\' + type + \'"]\')');
    }
    
    static public function setElementSize(element:js.html.DOMElement, width:Int, height:Int):Void {
        untyped __js__('element.style.width = width + "px"');
        untyped __js__('element.style.height = height + "px"');
    }
}

extern class React {
    public function version():String;
    public function state(initial:Dynamic): React ;
    public function empty():Dynamic;
    public function bindTo(params:Rest<Dynamic>):Dynamic;
    public function call():Dynamic;
    public function set(value:Dynamic):Void;
}

/**
 * Begin to use: https://github.com/mattbaker/Reactive.js
 */
@:expose('reactive')
class Reactive {

    private function new() {}

    /**
     * This is the reactive core.
     */
    static public function react<F>(?fun:F):React {
        if (null != fun) {
            return untyped __js__("$R(fun)");
        }
        return untyped __js__("$R");
    }

    //
    // Anything else is not mandatory
    //
}
