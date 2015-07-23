set PS=powershell
set DOCUMENTOR=phpDocumentor.phar
:: default "clean" template does not support feature of using packages instead of namespaces
%PS% php %DOCUMENTOR% project:run -d .\bbmvc -t docs
:: --template=responsive-twig
pause
