FROM wordpress:latest

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# Copy custom theme and plugins from local to container
COPY ./wordpress/wp-content/themes /var/www/html/wp-content/themes
COPY ./wordpress/wp-content/plugins /var/www/html/wp-content/plugins

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html/wp-content
RUN chmod -R 755 /var/www/html/wp-content

# Copy PHP settings
COPY uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]