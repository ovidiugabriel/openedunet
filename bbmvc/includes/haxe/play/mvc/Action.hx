
package play.mvc;

extern class Action<T> extends Results {
    var configuration:T;
    private function new(); /* abstract class */

    // abstract java.util.concurrent.CompletionStage<Result> 	call(Http.Context ctx)
    public function call(ctx:Dynamic):Dynamic;
}

class Action_Simple {
}
