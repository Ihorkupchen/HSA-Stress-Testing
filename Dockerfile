FROM php:8.1-cli

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Set working directory
WORKDIR /var/www/html

# Copy the source code into the container
COPY ./src /var/www/html

# Command to run on container start
CMD php /var/www/html/migrate.php && php -S 0.0.0.0:80 -t /var/www/html