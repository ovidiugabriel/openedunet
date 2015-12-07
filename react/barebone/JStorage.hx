/**
 * http://www.jstorage.info/
 */
@:native('$.jStorage')
@:final
extern class JStorage {
    /**
     * Saves a value to local storage. key needs to be string otherwise an
     * exception is thrown. value can be any JSONeable value, including objects
     * and arrays or a XML node.
     * Currently XML nodes can't be nested inside other objects:
     * $.jStorage.set("xml", xml_node) is OK but $.jStorage.set("xml", {xml: xml_node}) is not.
     *
     * Options is an optional options object. Currently only available option is options.
     * TTL which can be used to set the TTL value to the key
     * ($.jStorage.set(key, value, {TTL: 1000});). NB - if no TTL option value has
     * been set, any currently used TTL value for the key will be removed.
     */
    static public function set(key:Dynamic, value:Dynamic, ?options:Dynamic):Dynamic;

    /**
     * get retrieves the value if key exists, or default if it doesn't.
     * key needs to be string otherwise an exception is thrown. default can be any value.
     *
     * @param  key       [description]
     * @param  ?_default [description]
     * @return           [description]
     */
    static public function get(key:Dynamic, ?_default:Dynamic):Dynamic;

    /**
     * Removes a key from the storage. key needs to be string otherwise an exception is thrown.
     *
     * @param  key [description]
     * @return     [description]
     */
    static public function deleteKey(key:Dynamic):Dynamic;

    /**
     * Sets a TTL (in milliseconds) for an existing key. Use 0 or negative value to clear TTL.
     *
     * @param key [description]
     * @param ttl [description]
     */
    static public function setTTL(key:Dynamic, ttl:Dynamic):Dynamic;

    /**
     * Gets remaining TTL (in milliseconds) for a key or 0 if not TTL has been set.
     *
     * @param  key [description]
     * @return     [description]
     */
    static public function getTTL(key:Dynamic):Dynamic;

    /**
     * Clears the cache.
     *
     * @return [description]
     */
    static public function flush():Dynamic;

    /**
     * Returns all the keys currently in use as an array.
     *
     *     var index = $.jStorage.index();
     *     console.log(index); // ["key1","key2","key3"]
     *
     * @return [description]
     */
    static public function index():Dynamic;

    /**
     * Returns the size of the stored data in bytes
     *
     * @return [description]
     */
    static public function storageSize():Dynamic;

    /**
     * Returns the storage engine currently in use or false if none
     *
     * @return [description]
     */
    static public function currentBackend():Dynamic;

    /**
     * Reloads the data from browser storage
     *
     * @return [description]
     */
    static public function reInit():Dynamic;

    /**
     * Returns true if storage is available
     *
     * @return [description]
     */
    static public function storageAvailable():Dynamic;

    /**
     * Subscribes to a Publish/Subscribe channel
     *
     * @param  channel  [description]
     * @param  callback [description]
     * @return          [description]
     */
    static public function subscribe(channel:Dynamic, callback:Dynamic):Dynamic;

    /**
     * Publishes payload to a Publish/Subscribe channel
     *
     * @param  channel [description]
     * @param  payload [description]
     * @return         [description]
     */
    static public function publish(channel:Dynamic, payload:Dynamic):Dynamic;

    /**
     * Listens for updates for selected key.
     * NB! even updates made in other windows/tabs are reflected, so this
     * feature can also be used for some kind of publish/subscribe service.
     *
     * @param  key      [description]
     * @param  callback [description]
     * @return          [description]
     */
    static public function listenKeyChange(key:Dynamic, callback:Dynamic):Dynamic;

    /**
     * Stops listening for key change.
     * If callback is set, only the used callback will be cleared, otherwise all listeners will be dropped.
     *
     * @param  key       [description]
     * @param  ?callback [description]
     * @return           [description]
     */
    static public function stopListening(key:Dynamic, ?callback:Dynamic):Dynamic;
}
