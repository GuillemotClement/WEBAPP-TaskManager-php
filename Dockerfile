FROM dunglas/frankenphp

RUN install-php-extensions \
  pdo \
	pdo_pgsql \
	intl \
	zip 

# Copie du projet
COPY ./public /app/public
COPY ./src /app/src
