FROM php:8.4-fpm

# Dependências e extensões PHP
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer
RUN mkdir /var/www/.composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia os arquivos para dentro do container
COPY . /app

WORKDIR /app

# Instala dependências do Composer
RUN composer install --optimize-autoloader

# Inicia a aplicação
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
