wudele
======
[![Build Status](https://travis-ci.org/JeanFred/wudele-toolforge.svg?branch=master)](https://travis-ci.org/JeanFred/wudele-toolforge)

A deployment of [Framadate](https://framagit.org/framasoft/framadate/framadate/) on the [Wikimedia Cloud Toolforge](https://tools.wmflabs.org/).


## Development

Use [docker-compose](https://docs.docker.com/compose/)
```
docker-compose up -d

```
You will then need to run database migrations at `http://localhost:8000/wudele/admin/migration.php`.

Framadate will be available at `http://localhost:8080/wudele/`
