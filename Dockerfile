# Use a imagem base oficial do PHP
FROM php:7.4-fpm

# Instale dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Instale extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instale o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Defina o diretório de trabalho
WORKDIR /var/www

# Copie o restante do código do projeto
COPY . .

# Instale as dependências do Laravel
RUN composer install

# Copie o arquivo de configuração do Nginx
COPY ./docker/nginx/conf.d/app.conf /etc/nginx/conf.d/default.conf

# Permissões para o storage e cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponha a porta 9000 e inicie o PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
