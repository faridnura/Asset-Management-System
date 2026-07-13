# Menggunakan PHP resmi dengan Apache
FROM php:8.2-apache

# Instal ekstensi sistem yang dibutuhkan Laravel & PostgreSQL/MySQL
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip unzip git curl libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql gd

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Ubah Document Root Apache ke folder 'public' Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Ubah port Apache ke 7860 (Wajib untuk Hugging Face Spaces)
RUN sed -i 's/Listen 80/Listen 7860/' /etc/apache2/ports.conf
RUN sed -i 's/<VirtualHost \*:80>/<VirtualHost \*:7860>/' /etc/apache2/sites-available/*.conf

# Set folder kerja
WORKDIR /var/www/html

# Salin semua file project
COPY . .

# Instal Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Hugging Face membutuhkan izin akses root/user yang longgar pada folder storage
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Buka port 7860
EXPOSE 7860

# Jalankan Apache di foreground
CMD ["apache2-foreground"]
