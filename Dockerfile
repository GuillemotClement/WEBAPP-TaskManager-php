FROM dunglas/frankenphp

RUN install-php-extensions \
  pdo \
	pdo_pgsql \
	intl \
	zip 

# composer n'est pas installer par defaut avec Franken
# il faut venir ajouter cette configuration

# installation de composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# copie des fichiers de l'application
COPY ./public /app/public
COPY ./src /app/src
COPY composer.json composer.lock /app/

# definition du dossier de travail
WORKDIR /app

# installation des dependances PHP
RUN composer install --no-interection
