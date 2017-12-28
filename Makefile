APP_CONTAINER=fseinventory_app
MARIADB_CONTAINER=fseinventory_mariadb
PHPMYADMIN_CONTAINER=fseinventory_phpmyadmin

NETWORK=fseinventory

run: rm
	docker network create $(NETWORK)
	docker run -d -p 4306:3306 --network=$(NETWORK) -v $(pwd)/../fse-inventory-db:/bitnami -e ALLOW_EMPTY_PASSWORD=yes --user root --name $(MARIADB_CONTAINER) bitnami/mariadb:latest
	docker run -d -p 8181:80 -p 4433:443 --network=$(NETWORK) --name $(PHPMYADMIN_CONTAINER) bitnami/phpmyadmin:latest
	docker run -d -p 8000:8000 --network=$(NETWORK) -v $(pwd):/app -e CODEIGNITER_PROJECT_NAME=fse-inventory --name $(APP_CONTAINER) bitnami/codeigniter:latest

rm:
	docker network rm $(NETWORK) || true
	docker rm -f $(MARIADB_CONTAINER) || true
	docker rm -f $(PHPMYADMIN_CONTAINER) || true
	docker rm -f $(APP_CONTAINER) || true

enter:
	docker exec -it $(container) /bin/bash || echo "Must include a container name"