// ==UserScript==
// @name        Popup Killer
// @namespace   http://www.ovidiugabriel.net/internet
// @version     1
// @grant       none
// Info: http://www.ovidiugabriel.net/internet/popup-removal.html
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
    var url ="http://www.vivre.ro/";
    
    if (url == document.URL.substr(0, url.length)) {        
        // We are on http://www.vivre.ro/
        doDestroyModal('signup-wrapper');
        doDestroyModal('login-wrapper');
        return true;
    }
    
    url = "http://www.homeycomb.ro";
    if (url == document.URL.substr(0, url.length)) {        
        console.log('We are on homeycomb.ro');
        // We are on http://www.homeycomb.ro/
        if (document.getElementById('main_popup_login')) {
           document.getElementById('main_popup_login').remove();
           document.getElementById('control_overlay').remove();
        }
        
        return true;
    }
    
    
    return false;
}

var killExecuted = false;
function script_loaded() {
    $.noConflict();
    jQuery(document).ready(function(){
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

