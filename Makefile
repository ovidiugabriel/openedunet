#
# $SHELL is not working correctly.
# For example in cygwin I get: "Error: '/bin/bash' not found"
# or even "/bin/sh: ...: No such file or directory"
#
# On Windows, I had the best results using Digital Mars make: /cygdrive/c/dm/bin/make
# On Linux it worked just fine.
#
DOCUMENTOR=phpDocumentor.phar
PHPUNIT=phpunit
COMPOSER=composer.phar

none:
	# nothing to be done

docs:
	php $(DOCUMENTOR) project:run -d bbmvc -t docs

tup:
	tup upd

unittest:
	# Composing Test Suite Using the Filesystem
	$(PHPUNIT) --bootstrap bbmvc/bootstrap.php bbmvc/tests

composer-update:
	php $(COMPOSER) update

composer-self-update:
	php $(COMPOSER) self-update

composer-install:
	bash -c 'curl -sS "https://getcomposer.org/installer" | php'
	# Pipe is not working in Windoze

# don't forget to ensure_newline_at_eof_on_save
