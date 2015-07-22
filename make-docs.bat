set PS=powershell
set DOCUMENTOR=phpDocumentor.phar
%PS% php %DOCUMENTOR% project:run -d .\bbmvc -t docs
pause
