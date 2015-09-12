#
# If SHELL variable is not set, the current shell is used
#
DOCUMENTOR=phpDocumentor.phar
PHPUNIT=phpunit

none:
	# nothing to be done

docs:
	$(SHELL) php $(DOCUMENTOR) project:run -d bbmvc -t docs

tup:
	$(SHELL) tup upd

unittest:
	# Composing Test Suite Using the Filesystem
	$(SHELL) $(PHPUNIT) --bootstrap bbmvc/bootstrap.php bbmvc/tests

# don't forget to ensure_newline_at_eof_on_save
