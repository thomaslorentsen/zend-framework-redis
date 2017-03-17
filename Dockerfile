FROM php:5.6-apache

RUN a2enmod rewrite

COPY application/ /var/www/html/

EXPOSE 80
