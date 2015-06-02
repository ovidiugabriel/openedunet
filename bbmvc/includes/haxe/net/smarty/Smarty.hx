
package net.smarty;

extern class Smarty {

    // addConfigDir() — add a directory to the list of directories where config files are stored
    // http://www.smarty.net/docs/en/api.add.config.dir.tpl
    // Smarty addConfigDir(string|array config_dir,string key);
    public function addConfigDir(config_dir:Dynamic, key:String): Smarty;

    // addPluginsDir() — add a directory to the list of directories where plugins are stored
    // http://www.smarty.net/docs/en/api.add.plugins.dir.tpl
    // Smarty addPluginsDir(string|array plugins_dir);
    public function addPluginsDir(plugins_dir:Dynamic): Smarty;

    // addTemplateDir() — add a directory to the list of directories where templates are stored
    // http://www.smarty.net/docs/en/api.add.template.dir.tpl
    // Smarty addTemplateDir(string|array template_dir, string key);
    public function addTemplateDir(template_dir:Dynamic, key:String): Smarty;

    // append() — append an element to an assigned array
    // @see http://www.smarty.net/docs/en/api.append.tpl
    // void append(mixed var);
    // void append(string varname, mixed var, bool merge);
    public function append(varname:Dynamic, ?_var:Dynamic, ?merge:Bool): Void;

    // appendByRef() — append values by reference
    // http://www.smarty.net/docs/en/api.append.by.ref.tpl
    // void appendByRef(string varname, mixed var, bool merge);
    public function appendByRef(varname:String, _var:Dynamic, merge:Bool): Void;

    // assign() — assign variables/objects to the templates
    // @see http://www.smarty.net/docs/en/api.assign.tpl
    // void assign(mixed var);
    // void assign(string varname, mixed var, bool nocache);
    public function assign(varname:Dynamic, ?_var:Dynamic, ?nocache:Bool): Void;

    // assignByRef() — assign values by reference
    // http://www.smarty.net/docs/en/api.assign.by.ref.tpl
    // void assignByRef(string varname, mixed var);
    public function assignByRef(varname:String, _var:Dynamic):Void;

    // clearAllAssign() — clears the values of all assigned variables
    // http://www.smarty.net/docs/en/api.clear.all.assign.tpl
    // void clearAllAssign();
    public function clearAllAssign():Void;

    // clearAllCache() — clears the entire template cache
    // http://www.smarty.net/docs/en/api.clear.all.cache.tpl
    // void clearAllCache(int expire_time);
    public function clearAllCache(expire_time:Int):Void;

    // clearAssign() — clears the value of an assigned variable
    // http://www.smarty.net/docs/en/api.clear.assign.tpl
    // void clearAssign(mixed var);
    public function clearAssign(_var:Dynamic):Void;

    // clearCache() — clears the cache for a specific template
    // http://www.smarty.net/docs/en/api.clear.cache.tpl
    // void clearCache(string template, string cache_id, string compile_id, int expire_time);
    public function clearCache(template:String, cache_id:String, compile_id:String, expire_time:Int):Void;

    // clearCompiledTemplate() — clears the compiled version of the specified template resource
    // http://www.smarty.net/docs/en/api.clear.compiled.tpl.tpl
    // void clearCompiledTemplate(string tpl_file, string compile_id, int exp_time);
    public function clearCompiledTemplate(tpl_file:String, compile_id:String, exp_time:Int):Void;

    // clearConfig() — clears assigned config variables
    // http://www.smarty.net/docs/en/api.clear.config.tpl
    // void clearConfig(string var);
    public function clearConfig(_var:String):Void;

    // compileAllConfig() — compiles all known config files
    // http://www.smarty.net/docs/en/api.compile.all.config.tpl
    // string compileAllConfig(string extension, boolean force, integer timelimit, integer maxerror);
    public function compileAllConfig(extension:String, force:Bool, timelimit:Int, maxerror:Int):String;

    // compileAllTemplates() — compiles all known templates
    // http://www.smarty.net/docs/en/api.compile.all.templates.tpl
    // string compileAllTemplates(string extension, boolean force, integer timelimit, integer maxerror);
    public function compileAllTemplates(extension:String, force:Bool, timelimit:Int, maxerror:Int):String;

    // configLoad() — loads config file data and assigns it to the template
    // http://www.smarty.net/docs/en/api.config.load.tpl
    // void configLoad(string file, string section);
    public function configLoad(file:String, section:String):Void;

    // createData() — creates a data object
    // http://www.smarty.net/docs/en/api.create.data.tpl
    // string createData(object parent);
    // string createData();
    public function createData(?parent:Dynamic):String;

    // createTemplate() — returns a template object
    // http://www.smarty.net/docs/en/api.create.template.tpl
    // Smarty_Internal_Template createTemplate(string template, object parent);
    // Smarty_Internal_Template createTemplate(string template, array data);
    // Smarty_Internal_Template createTemplate(string template, string cache_id, string compile_id, object parent);
    // Smarty_Internal_Template createTemplate(string template, string cache_id, string compile_id, array data);
    public function createTemplate(template:String, parent_data_cache_id:Dynamic,
        ?compile_id:String, parent_data:Dynamic):net.smarty.internal.Template;

    // disableSecurity() — disables template security
    // http://www.smarty.net/docs/en/api.disable.security.tpl
    // string disableSecurity();
    public function disableSecurity():String;

    // display() — displays the template
    // http://www.smarty.net/docs/en/api.display.tpl
    // void display(string template, string cache_id, string compile_id);
    public function display(template:String, cache_id:String, compile_id:String):Void;

    // enableSecurity() — enables template security
    // http://www.smarty.net/docs/en/api.enable.security.tpl
    // string enableSecurity(string securityclass);
    // string enableSecurity(object securityobject);
    // string enableSecurity();
    public function enableSecurity(security_class:Dynamic):String;

    // fetch() — returns the template output
    // http://www.smarty.net/docs/en/api.fetch.tpl
    // string fetch(string template, string cache_id, string compile_id);
    public function fetch(template:String, cache_id:String, compile_id:String):String;

    // getCacheDir() — return the directory where the rendered template's output is stored
    // http://www.smarty.net/docs/en/api.get.cache.dir.tpl
    // string getCacheDir();
    public function  getCacheDir():String;

    // getCompileDir() — returns the directory where compiled templates are stored
    // http://www.smarty.net/docs/en/api.get.compile.dir.tpl
    // string getCompileDir();
    public function getCompileDir():String;

    // getConfigDir() — return the directory where config files are stored
    // http://www.smarty.net/docs/en/api.get.config.dir.tpl
    // string|array getConfigDir(string key);
    public function getConfigDir(key:String):Dynamic;

    // getConfigVars() — returns the given loaded config variable value
    // http://www.smarty.net/docs/en/api.get.config.vars.tpl
    // array getConfigVars(string varname);
    public function getConfigVars():php.NativeArray;

    // getPluginsDir() — return the directory where plugins are stored
    // http://www.smarty.net/docs/en/api.get.plugins.dir.tpl
    // array getPluginsDir();
    public function getPluginsDir():php.NativeArray;

    // getRegisteredObject() — returns a reference to a registered object
    // http://www.smarty.net/docs/en/api.get.registered.object.tpl
    // array getRegisteredObject(string object_name);
    public function getRegisteredObject(object_name:String):php.NativeArray;

    // getTags() — return tags used by template
    // http://www.smarty.net/docs/en/api.get.tags.tpl
    // string getTags(object template);
    public function getTags(template:Dynamic):String;

    // getTemplateDir() — return the directory where templates are stored
    // http://www.smarty.net/docs/en/api.get.template.dir.tpl
    // string|array getTemplateDir(string key);
    public function getTemplateDir(key:String):Dynamic;

    // getTemplateVars() — returns assigned variable value(s)
    // http://www.smarty.net/docs/en/api.get.template.vars.tpl
    // array getTemplateVars(string varname);
    public function getTemplateVars(varname:String):php.NativeArray;


    // isCached() — returns true if there is a valid cache for this template
    // http://www.smarty.net/docs/en/api.is.cached.tpl
    // bool isCached(string template, string cache_id, string compile_id);
    public function isCached(template:String, cache_id:String, compile_id:String):Bool;

    // loadFilter() — load a filter plugin
    // http://www.smarty.net/docs/en/api.load.filter.tpl
    // void loadFilter(string type, string name);
    public function loadFilter(type:String, name:String):Void;

    // Smarty::muteExpectedErrors() — mutes expected warnings and notices deliberately generated by Smarty
    // http://www.smarty.net/docs/en/api.mute.expected.errors.tpl
    // string muteExpectedErrors();
    static public function muteExpectedErrors():String;

    // registerCacheResource() — dynamically register CacheResources
    // http://www.smarty.net/docs/en/api.register.cacheresource.tpl
    // void registerCacheResource(string name, Smarty_CacheResource resource_handler);
    public function registerCacheResource(name:String, resource_handler:net.smarty.CacheResource):Void;

    // registerClass() — register a class for use in the templates
    // http://www.smarty.net/docs/en/api.register.class.tpl
    // void registerClass(string class_name, string class_impl);
    public function registerClass(class_name:String, class_impl:String):Void;

    // registerDefaultPluginHandler() — register a function which gets called on undefined tags
    // http://www.smarty.net/docs/en/api.register.default.plugin.handler.tpl
    // void registerDefaultPluginHandler(mixed callback);
    public function registerDefaultPluginHandler(callback:Dynamic):Void;

    // registerFilter() — dynamically register filters
    // http://www.smarty.net/docs/en/api.register.filter.tpl
    // void registerFilter(string type,mixed callback);
    public function registerFilter(type:String, callback:Dynamic):Void;

    // registerPlugin() — dynamically register plugins
    // http://www.smarty.net/docs/en/api.register.plugin.tpl
    // void registerPlugin(string type, string name, mixed callback, bool cacheable, mixed cache_attrs);
    public function registerPlugin(type:String, name:String, callback:Dynamic, cacheable:Bool, cache_attrs:Dynamic):Void;

    // registerObject() — register an object for use in the templates
    // http://www.smarty.net/docs/en/api.register.object.tpl
    // void registerObject(string object_name, object object, array allowed_methods_properties, boolean format, array block_methods);
    public function registerObject(object_name:String, object:Dynamic ):Void;

    // registerResource() — dynamically register resources
    // http://www.smarty.net/docs/en/api.register.resource.tpl
    // void registerResource(string name, Smarty_resource resource_handler);
    public function registerResource(name:String, resource_handler:net.smarty.Resource):Void;

    // setCacheDir() — set the directory where the rendered template's output is stored
    // http://www.smarty.net/docs/en/api.set.cache.dir.tpl
    // Smarty setCacheDir(string cache_dir);
    public function setCacheDir(cache_dir:String):Smarty;

    // setCompileDir() — set the directory where compiled templates are stored
    // http://www.smarty.net/docs/en/api.set.compile.dir.tpl
    // Smarty setCompileDir(string compile_dir);
    public function setCompileDir(compile_dir:String):Smarty;

    // setConfigDir() — set the directories where config files are stored
    // http://www.smarty.net/docs/en/api.set.config.dir.tpl
    // Smarty setConfigDir(string|array config_dir);
    public function setConfigDir(config_dir:Dynamic):Smarty;

    // setPluginsDir() — set the directories where plugins are stored
    // http://www.smarty.net/docs/en/api.set.plugins.dir.tpl
    // Smarty setPluginsDir(string|array plugins_dir);
    public function setPluginsDir(plugins_dir:Dynamic):Smarty;

    // setTemplateDir() — set the directories where templates are stored
    // http://www.smarty.net/docs/en/api.set.template.dir.tpl
    // Smarty setTemplateDir(string|array setTemplateDir);
    public function setTemplateDir(setTemplateDir:Dynamic):Smarty;

    // templateExists() — checks whether the specified template exists
    // http://www.smarty.net/docs/en/api.template.exists.tpl
    // bool templateExists(string template);
    public function templateExists(template:String):Bool;

    // unregisterCacheResource() — dynamically unregister a CacheResource plugin
    // http://www.smarty.net/docs/en/api.unregister.cacheresource.tpl
    // void unregisterCacheResource(string name);
    public function unregisterCacheResource(name:String):Void;

    // unregisterFilter() — dynamically unregister a filter
    // http://www.smarty.net/docs/en/api.unregister.filter.tpl
    // void unregisterFilter(string type, string|array callback);
    public function unregisterFilter(type:String, callback:Dynamic):Void;

    // unregisterPlugin — dynamically unregister plugins
    // http://www.smarty.net/docs/en/api.unregister.plugin.tpl
    // void unregisterPlugin(string type, string name);
    public function unregisterPlugin(type:String, name:String):Void;

    // unregisterObject() — dynamically unregister an object
    // http://www.smarty.net/docs/en/api.unregister.object.tpl
    // void unregisterObject(string object_name);
    public function unregisterObject(object_name:String):Void;

    // unregisterResource() — dynamically unregister a resource plugin
    // http://www.smarty.net/docs/en/api.unregister.resource.tpl
    // void unregisterResource(string name);
    public function unregisterResource(name:String):Void;

    // testInstall() — checks Smarty installation
    // http://www.smarty.net/docs/en/api.test.install.tpl
    // void testInstall();
    public function testInstall():Void;
}
