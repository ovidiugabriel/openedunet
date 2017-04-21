
package play.mvc;

class Action<T> extends Results {
    var configuration:T;
    private function new() {} /* abstract class */

    // abstract java.util.concurrent.CompletionStage<Result> call( ctx)
    public function call(ctx:Http_Context):CompletionStage<Result> {}
}

class Action_Simple extends Action<Void> {
}
