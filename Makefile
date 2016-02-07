#
# If SHELL variable is not set, the current shell is used
#
DOCUMENTOR=phpDocumentor.phar
PHPUNIT=phpunit
COMPOSER=composer.phar

none:
	# nothing to be done

docs:
	$(SHELL) php $(DOCUMENTOR) project:run -d bbmvc -t docs

tup:
	$(SHELL) tup upd

unittest:
	# Composing Test Suite Using the Filesystem
	$(SHELL) $(PHPUNIT) --bootstrap bbmvc/bootstrap.php bbmvc/tests

composer-update:
	$(SHELL) php $(COMPOSER) update

composer-self-update:
	$(SHELL) php $(COMPOSER) self-update

composer-install:
	bash -c 'curl -sS "https://getcomposer.org/installer" | php'
	# Pipe is not working in Windoze

# don't forget to ensure_newline_at_eof_on_save
