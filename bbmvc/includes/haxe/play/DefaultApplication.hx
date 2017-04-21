
// See: https://www.playframework.com/documentation/2.5.x/api/java/index.html?play/package-tree.html

class DefaultApplication {
    public function configuration():Configuration{}
    public function getWrappedApplication():play.api.Application{}
    public function injector():Injector{}
}
