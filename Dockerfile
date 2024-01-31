# Use a lightweight web server as the base image
FROM nginx:alpine
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /usr/share/nginx/html

# Copy all files from the build context into the container
COPY . .

# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd

# Expose the default HTTP port
EXPOSE 80

# Start Apache when the container runs
CMD ["apache2-foreground"]
