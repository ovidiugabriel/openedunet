
/** 
    Makefile reader implementation.
 **/
class Make {
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
