#
# If SHELL variable is not set, the current shell is used
#
DOCUMENTOR=phpDocumentor.phar

docs:
	$(SHELL) php $(DOCUMENTOR) project:run -d bbmvc -t docs

tup:
	$(SHELL) tup upd
