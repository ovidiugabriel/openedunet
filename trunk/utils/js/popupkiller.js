// ==UserScript==
// @name        Popup Killer
// @namespace   http://www.ovidiugabriel.net/internet
// @version     1
// @grant       none
// ==/UserScript==

var Loader = function () { };
Loader.prototype = {
    require: function (scripts, callback) {
        this.loadCount      = 0;
        this.totalRequired  = scripts.length;
        this.callback       = callback;

        for (var i = 0; i < scripts.length; i++) {
            this.writeScript(scripts[i]);
        }
    },
    loaded: function (evt) {
        this.loadCount++;

        if (this.loadCount == this.totalRequired && typeof this.callback == 'function') this.callback.call();
    },
    writeScript: function (src) {
        var self = this;
        var s = document.createElement('script');
        s.type = "text/javascript";
        s.async = true;
        s.src = src;
        s.addEventListener('load', function (e) { self.loaded(e); }, false);
        var head = document.getElementsByTagName('head')[0];
        head.appendChild(s);
    }
};

/** 
 * Returns true if we are on a blacklisted site.
 */
function ExecuteKill() {
    // TODO: remove harcoded testing
    if ("http://www.vivre.ro/" == document.URL.substr(0, "http://www.vivre.ro/".length)) {
        // We are on http://www.vivre.ro/
        document.getElementById('login-wrapper').style.display = 'none';
        document.getElementsByClassName('ui-widget-overlay').item(0).style.display = 'none';       
        return true;
    }
    return false;
}

var killExecuted = false;
function script_loaded() {
    console.log('jQuery loaded');
    
    $(document).ready(function(){
        console.log('document ready:', document.URL);        
        ExecuteKill();
        killExecuted = true; // popup removal executed, we have to show the page now
        document.body.style.display = '';
    });
}

function TimerCallback() {    
    if (!killExecuted) {
       document.body.style.display = 'none';
       if (!ExecuteKill()) { // Not needed to execute popup removal on this page
           killExecuted = true;
           document.body.style.display = '';
       }
       setTimeout(TimerCallback, 0);
    }    
};
setTimeout(TimerCallback, 0);

var loader = new Loader();
loader.require([
       "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"
    ], 
    script_loaded);
