
/** 
    Makefile reader implementation.
 **/
class Make {
    /** 

     **/
    static public function main(args : Array<String>) : Int {
        var rules  = new Map<String, Array<String>>();
        var target = "";
        
        
        if (args.length >= 2) {
            var selected_target = args[1];
        } else {
            trace('Options: \n');
        }
        return 0;
    }
    
    /** 
        Replace Makefile variables. Replaces $(key) with value.
     **/
    static function replaceVars(subject : String, vars : Map<String, Dynamic>) : String {
        var key : String;
        for (key in vars.keys()) {
            subject = StringTools.replace(subject, '$$($key)', vars[key]);
        }
        return subject;
    }
}
