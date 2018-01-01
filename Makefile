APPLICATION_PATH=$(PWD)

APP_CONTAINER=fseinventory_app
MARIADB_CONTAINER=fseinventory_mariadb
PHPMYADMIN_CONTAINER=fseinventory_phpmyadmin

NETWORK=fseinventory_default

run: rm
	docker network create $(NETWORK)
	docker run -d -p 4306:3306 --network=$(NETWORK) --network-alias mariadb -v $(APPLICATION_PATH)/../fse-inventory-db:/bitnami -e ALLOW_EMPTY_PASSWORD=yes --user root --name $(MARIADB_CONTAINER) bitnami/mariadb:latest
	docker run -d -p 8181:80 -p 4433:443 --network=$(NETWORK) --network-alias phpmyadmin --name $(PHPMYADMIN_CONTAINER) bitnami/phpmyadmin:latest
	docker run -d -p 8000:8000 --network=$(NETWORK) --network-alias myapp -v $(APPLICATION_PATH):/app -e CODEIGNITER_PROJECT_NAME=fse-inventory --name $(APP_CONTAINER) bitnami/codeigniter:latest

stop:
	docker stop $(APP_CONTAINER)
	docker stop $(PHPMYADMIN_CONTAINER)
	docker stop $(MARIADB_CONTAINER)

rm:
	docker rm -f $(MARIADB_CONTAINER) || true
	docker rm -f $(PHPMYADMIN_CONTAINER) || true
	docker rm -f $(APP_CONTAINER) || true
	docker network rm $(NETWORK) || true

enter:
	docker exec -it $(container) /bin/bash || echo "Must include a container name"