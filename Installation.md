# Installation of base framework #

  1. Check out a read-only working copy anonymously over HTTP.
```
svn checkout http://openedunet.googlecode.com/svn/trunk/ openedunet-read-only 
```
  1. Extract the archive in your working directory.
  1. Move the contents of **bbmvc** folder to your document root  (where do you wish to keep your site).
  1. Now open the file named **profile** and type your name instead of _mihai_.
  1. If you are working at the same time on different configurations (different operating systems on the same machine, different web servers on the same operating system or just different machines, or the same machine and different network connections) it is strongly recommended to include environment into your configuration. For example: _yourname-windows_ and _yourname-ubuntu_ or _yourname-work_ and _yourname-home_
  1. Create a copy of **config/config\_mihai.php** and rename it to **config/config\_yourname.php**. Make the following changes to this new file:
    * change **`_`DIR\_PROJECT** to your **DOCUMENT\_ROOT**
    * change **`_`URL\_MAIN** to your **HTTP\_HOST** with "http://" prefix
Base system is completely installed right now. But you may continue with advanced steps like SetupDatabaseConnection

