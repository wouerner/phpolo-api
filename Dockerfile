FROM library/ubuntu:16.04
RUN apt update
RUN apt -y upgrade
RUN DEBIAN_FRONTEND=noninteractive && apt-get install -y php apache2 libapache2-mod-php
RUN DEBIAN_FRONTEND=noninteractive && apt-get install -y php-sqlite3 php-xdebug sqlite3 php-curl curl
ADD 000-default.conf /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod rewrite
RUN a2enmod headers 
COPY docker-entrypoint.sh /usr/local/bin/

ENTRYPOINT ["docker-entrypoint.sh"]

