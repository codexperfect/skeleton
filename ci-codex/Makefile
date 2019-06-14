include Makefile.vars

composer.json:
	@echo "*** INIT COMPOSER ***"

Makefile:
	@echo "*** INIT Makefile ***"

init-project:
	@echo "*** INIT PROJECT ***"


install:
	@echo "*** COMPOSER INSTALL ***"
	rm -rf  ~/.composer/cache/repo/git-bitbucket.org-codexperfect-*
	rm -rf  ~/.composer/cache/vcs/git-bitbucket.org-codexperfect-*
	rm -rf  ~/.cache/composer/repo/git-bitbucket.org-codexperfect-*
	rm -rf  ~/.cache/composer/vcs/git-bitbucket.org-codexperfect-*
	git pull
	composer install

update:
	@echo "*** COMPOSER UPDATE ***"
	rm -rf  ~/.composer/cache/repo/git-bitbucket.org-codexperfect-*
	rm -rf  ~/.composer/cache/vcs/git-bitbucket.org-codexperfect-*
	rm -rf  ~/.cache/composer/repo/git-bitbucket.org-codexperfect-*
	rm -rf  ~/.cache/composer/vcs/git-bitbucket.org-codexperfect-*
	git pull
	composer update

site-init-remote:
	@echo "*** INIT SITE ***"
	composer codex-site-init-remote
	bin/drush cr -y --root=${D8_ROOT}
	bin/drush st -y --root=${D8_ROOT}

site-init-drupalvm:
	@echo "*** INIT SITE ***"
	composer codex-site-init-drupalvm
	bin/drush cr -y --root=${D8_ROOT}
	bin/drush st -y --root=${D8_ROOT}

cex:
	@echo "*** DRUPAL CONFIGURATION EXPORT ***"
	bin/drush cex -y --root=${D8_ROOT} --destination=${CONFIG}

cim:
	@echo "*** DRUPAL CONFIGURATION IMPORT ***"
	bin/drush cim -y --root=${D8_ROOT} --source=${CONFIG}

dump-db:
	@echo "*** DRUPAL DATABASE DUMP ***"
	bin/drush sql:dump -y --result-file=${ARCH}/${DBFILE}
	rm ${ARCH}/${DBLINK}
	@cd ${ARCH}; ln -s ${DBFILE} ${DBLINK}

updb:
	@echo "*** Running database updates ***"
	bin/drush updb -y --root=${D8_ROOT}

refresh:
	make updb
	make cim
	bin/drush cr -y --root=${D8_ROOT}

init-settings:
	bin/drupal module:uninstall xtcelastica -y --root=${D8_ROOT}; bin/drupal module:install xtcelastica -y --root=${D8_ROOT};
	bin/drupal module:uninstall xtcfile -y --root=${D8_ROOT}; bin/drupal module:install xtcfile -y --root=${D8_ROOT};
