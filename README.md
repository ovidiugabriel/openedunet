[![Donate](https://img.shields.io/badge/donate-paypal-blue.svg)](https://www.paypal.me/ovidiugabriel)


# openedunet
Automatically exported from `code.google.com/p/openedunet`

### About ###

Integrated e-learning platform and content management system, with support for teaching and learning, for tests and evaluations, for managing the educational content, for monitoring the educational system and creating the curricula.

Current license of this project is [Modified BSD License](https://code.google.com/p/openedunet/wiki/License). Content is Licensed under: [Creative Commons Attribution-ShareAlike 3.0 Unported](https://creativecommons.org/licenses/by-sa/3.0/legalcode)

The the core of **openedunet LMS** (Open Education Network Learning Management System) was originally based on **Barebone MVC** and it was called **oencore** (openedunet Core).

This page is also hosting the current version of [Barebone MVC]() Framework.

Official project website is: [http://www.openedunet.org/]([http://www.openedunet.org/)

### Clone mater branch ###

If you plan to make changes, use this command to check out the code as yourself using HTTPS:

```
git clone https://github.com/ovidiugabriel/openedunet.git
```

When prompted, enter your github user and password.

To use the HaXe toolkit
```
wget https://raw.githubusercontent.com/ovidiugabriel/openedunet/master/utils/buildpro/buildpro.py
```

### Framework Releases ###

| Release | Date      | Requires | File                                                 | MD5 checksum                     |
|---------|-----------|----------|------------------------------------------------------|----------------------------------|
| 0.2.0   | July 2007 | PHP 5.x  | [bbmvc-0.2.0.zip](http://www.icecontrol.eu/downloads/bbmvc-0.2.0.zip) | 11310c1c5d8e4ce5404fcaa3fde6fb8b |

### Quick Installation ###

```bash
wget http://www.icecontrol.eu/downloads/bbmvc-0.2.0.zip
unzip bbmvc-0.2.0.zip
wget https://raw.githubusercontent.com/ovidiugabriel/openedunet/master/bbmvc/tools/installer/install.php
```

### Manual Installation ###

**Note**: The usage of a database (like MySQL, PostgreSQL, CouchDB, etc) is **not required** for Barebone MVC.

However the bundled example and most of the tutorials are based on **mysqli** extension.

1. Unzip [bbmvc-0.2.0.zip](http://www.icecontrol.eu/downloads/bbmvc-0.2.0.zip) in your web-development folder
2. Create a database and create the table found at `/path-to-bbmvc/sql/tables/cds.sql`.
Edit `/path-to-bbmvc/config/config.php` and set the following constants: `_URL_MAIN`, `_DIR_PROJECT`, `_DB_USER`, `_DB_PASS`, `_DB_HOST`, `_DB_NAME`.
3. Make the `/path-to-bbmvc/tmp` folder writable by your web server.
4. Open your web browser at `_URL_MAIN`


### Changelist ###

[Changelist](https://github.com/ovidiugabriel/openedunet/blob/master/CHANGELIST.md)
