# Переменные
SAIL=./vendor/bin/sail

# Команды
install:
	$(SAIL) up -d
	$(SAIL) composer install
	$(SAIL) artisan jwt:secret
	$(SAIL) artisan key:generate
	$(SAIL) artisan migrate --seed

serve:
	$(SAIL) up -d

.PHONY: install serve
