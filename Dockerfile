# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: odhazzar <marvin@42.fr>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/06/22 10:19:07 by odhazzar          #+#    #+#              #
#    Updated: 2020/06/22 11:33:30 by odhazzar         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# INSTALL OS
FROM 		debian:buster


# PORTS IN CONTAINER
EXPOSE		80 443


# UPDATE AND INSTALL 
RUN 		apt-get -y update && apt-get -y upgrade

RUN 		apt-get install -y nginx

RUN			apt-get install -y openssl

RUN			apt-get install -y mariadb-server

RUN 		apt-get install -y php7.3 php-fpm php-mysql php-cli php-mysqlnd php-mbstring


# COPY NGINX CONFIG
COPY 		./srcs/default ./etc/nginx/sites-available/default


# COPY AUTOINDEX
COPY 		./srcs/autoindex.sh ./


#SET SSL ENCRYPTION
RUN			openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
			-keyout /etc/ssl/private/localhost.key \
			-out /etc/ssl/certs/localhost.crt \
			-subj '/C=RU/ST=MOSCOW/L=MOSCOW/O=21-school/CN=odhazzar'


# SET WORKING DIRECTORY
WORKDIR 	/var/www/html/


# INSTALL WORDPRESS AND REPLACE CONFIG
ADD			https://wordpress.org/latest.tar.gz wordpress.tar.gz
RUN			tar -xvf wordpress.tar.gz
RUN			rm -rf wordpress.tar.gz
COPY		./srcs/wp-config.php ./wordpress


# INSTALL PHPMYADMIN AND REPLACE CONFIG
ADD			https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.tar.gz phpMyAdmin-5.0.2-all-languages.tar.gz
RUN 		tar -xvf phpMyAdmin-5.0.2-all-languages.tar.gz
RUN			rm -rf phpMyAdmin-5.0.2-all-languages.tar.gz
RUN 		mv phpMyAdmin-5.0.2-all-languages ./phpmyadmin
COPY 		./srcs/config.inc.php ./phpmyadmin


# CHANGE OWNER OF SITES DIRECTORY
RUN 		chown -R www-data ./


# START SERVICES && CREATE USER AND DB
CMD			service mysql start;\
			service php7.3-fpm start;\
			echo "CREATE DATABASE wordpress;" | mysql -u root;\
			echo "CREATE USER 'admin'@'localhost' identified by '';" | mysql -u root;\
			echo "GRANT ALL PRIVILEGES ON wordpress.* TO 'admin'@'localhost';" | mysql -u root;\
			echo "FLUSH PRIVILEGES;" | mysql -u root;\
			service nginx start;\
			bash
