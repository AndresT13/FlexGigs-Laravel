# Imagen base oficial de PHP con Apache
FROM php:8.3-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev

# Instalar extensiones de PHP necesarias para Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Habilitar mod_rewrite para rutas amigables de Laravel
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar solo composer.json primero para aprovechar la cache
COPY composer.json composer.lock /var/www/html/

# Instalar dependencias con Composer (sin dev)
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Copiar TODO el proyecto
COPY . /var/www/html/

# Permisos necesarios para Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exponer puerto 80
EXPOSE 80

# Ejecutar Apache en primer plano
CMD ["apache2-foreground"]
