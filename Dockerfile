# Use nimmis/apache-php7 as the base image
FROM jelastic/apachephp:latest

# Copy the application code into the container
COPY ./app/public /var/www/html

# Expose port 80
EXPOSE 80

# Set environment variables for database connection
ENV MYSQL_HOST db
ENV MYSQL_PORT 3306
ENV MYSQL_USER db_user
ENV MYSQL_PASSWORD db_user_pass
ENV MYSQL_DATABASE app_db

# Install the mysqli extension
RUN docker-php-ext-install mysqli

# Start Apache server
CMD ["apache2-foreground"]
