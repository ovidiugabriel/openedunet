
```
├───applications
|   applications/<appname>/config
│   ├───development
│   ├───production
│   ├───staging
│   └───test
|----application/<appname>/logs
|----application/<appname>/cache
|----application/<appname>/helpers
├───application/<appname>/modules        
│   ├───controllers -- a collection of controllers
│   ├───models      -- a collection of models
└───application/<appname>/templates
│   └───presenters  -- a collection of presenters
│   └───views  -- a collection of presenters

├───includes       -- contains dispatcher internal logic (to be moved to classes)
│   ├───classes    -- classes that belong to the framework
│   └───libraries  -- packages provided by bundled 3rd party libraries
|   +---helpers
config.php         -- to be renamed to "config.profile.php"
index.php          -- the entry point
style.css          -- to be removed (it belongs to a public_html) folder
```