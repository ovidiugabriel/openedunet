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

    static var TYPE_STRING     = 'string';
    static var TYPE_NUMBER     = 'number';
    static var TYPE_BOOLEAN    = 'boolean';
    static var TYPE_OBJECT     = 'object';
    static var TYPE_FUNCTION   = 'function';
    static var TYPE_NULL       = 'null';
    static var TYPE_UNDEFINED  = 'undefined';
    static var TYPE_ARRAY      = 'Array';

    private function new() {}

    /**
        Advantage: Automatically detects if .val() or .text() method shall be
        called depending on the node type;

        If the element with given id does not exists, an exception will be thrown.
        When nothrow=true, the error is masked.
     **/
    static public function setValue( id : String, value : Dynamic, ?nothrow : Bool ) : Void {
        var element:Element = Browser.document.getElementById(id);

        if ((null !=  untyped __js__('element.value')) || 
            ('undefined' == untyped __typeof__(nothrow)) || 
            (false == nothrow)) 
        {
            untyped __js__('element.value = value');
        } else {
            element.textContent = value;
        }
    }

    /**
     * Advantage: Automatically detects if .val() or .text() method shall be
     * called depending on the node type;
     */
    static public function getValue( id : String ) : Dynamic {
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
        Gets the type of a given value.
        
        Possible values:
            - "boolean" (for true or false values)
            - "numeric" (for integer and floating point numbers)
            - "string" (for character strings)
            - "null" (for null references)
            - "undefined" (for symbols that are not declared yet)
            - "object" (for objects created without using a specific constructor, anonymous objects, dictionaries)
            - "Array" (for arrays)
            - other values for object created using a specific constructor, the constructor name is returned
     **/
    static public function getType( value : Dynamic ) : String {
        if ('object' == untyped __typeof__('value')) {
            if (untyped __strict_eq__(null, value)) {
                return 'null';
            }
            return Js.getClass(value);
        }
        return untyped __typeof__('value');
    }
    
    /** 
        Returns the constructor name if case that object is created using a specified constructor.
        Otherwise will return "object".
     **/
    static public function getClass( value : Dynamic ) : String {
        return untyped __js__('value.__proto__.constructor.name');
    }

    /**
        Automatically detects if value is not a number (integer or float) and
        returns the defaultValue in that case.
     **/
    static public function toFixed( value : Dynamic, decimals : Int, defaultValue : String) : String {
        // avoid using Std.parseFloat because it generates a wrapper
        var num:Float = untyped __js__('parseFloat(value)');
        if (Math.isNaN(num)) { // always use isNaN(), do not compare with NaN
            return defaultValue;
        }
        return untyped __js__('num.toFixed(decimals)');
    }
    
    /** 
        Gets the first DOM Element with given type attribute.
     */
    static public function getObjectByType( type : String ) : js.html.DOMElement {
        return untyped __js__('document.querySelector(\'object[type="\' + type + \'"]\')');
    }
    
    /** 
        Sets the width and height of a DOM Element using CSS style attributes.
     */
    static public function setElementSize( element : js.html.DOMElement, width : Int, height : Int) : Void {
        untyped __js__('element.style.width = width + "px"');
        untyped __js__('element.style.height = height + "px"');
    }
 
    /** 
        Enables console logging using timestamp.
        Golden Timestamp Logger usually works only on Firebug, but in Chrome this method will be needed.
    **/
    static public function timeStamp( message : String ) : Void {
        var pad : Int -> String -> String = function( n : Int, val : String ) { 
            return StringTools.lpad(val, '0', n); 
        }
        var date:Date = Date.now();
        var ms = untyped __js__('(new Date()).getMilliseconds()');
        var timestamp:String = pad(2, Std.string(date.getHours())) 
            + ':' + pad(2, Std.string(date.getMinutes())) 
            + ':' + pad(2, Std.string(date.getSeconds())) 
            + '.' + pad(3, ms);
        untyped __js__("console.log('%c' + timestamp + ' %c' + message, 'color: #B8860B', '')");        
    }
 
    /** 
        Check if function exists.
     **/
    static public function functionExists( name : String ) : Bool {
        return 'function' == untyped __js__('typeof window[name]');
    }
}

/**
 * Haxe Wrapper for Matt Baker Reactive JS functions.
 * https://github.com/mattbaker/Reactive.js
 */
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
    // Anything else is optional
    //
}
