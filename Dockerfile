FROM dunglas/frankenphp

RUN install-php-extensions \
  pdo \
	pdo_pgsql \
	intl \
	zip 

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copie du projet
COPY ./public /app/public
COPY ./src /app/src
