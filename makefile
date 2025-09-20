ENV_FILE := .env
COMPOSE_PATH := ./docker

up-docker:
	@clear
	docker compose --env-file $(ENV_FILE) -f $(COMPOSE_PATH)/docker-compose.yml up -d

down-docker:
	@clear
	docker compose --env-file $(ENV_FILE) -f $(COMPOSE_PATH)/docker-compose.yml down --remove-orphans

restart-docker:
	make down && make up
