#Utilizar a imagem Ubuntu como base
FROM ubuntu

ENV DEBIAN_FRONTEND=noninteractive

#Executar o comando apt-get update e instalar os seguintes pacotes: apache2, php5, libapache2-mod-php5, mysql-server, libapache2-mod-auth-mysql, php5-mysql
#TIP: o comando apt-get deve de ser executado com a opção -y para que o pacote seja instalado automaticamente
RUN apt-get update && apt-get -y install apache2 \
 	php5 \
 	libapache2-mod-php5 \
	mysql-server \
	libapache2-mod-auth-mysql \
	php5-mysql

RUN /etc/init.d/mysql start && mysqladmin -u root password '1234'  

#Adicionar todos os ficheiros da pasta ex3 (o caracter . "selecciona" todos os ficheiros) para a pasta /var/www/html
ADD . /var/www/html/

#Mudar a localização onde os próximos comandos serão executados para a pasta /var/www/html 
WORKDIR /var/www/html

#Copiar o ficheiro de configuração 000-default.conf localizado na pasta apache_conf para a pasta /etc/apache2/sites-available/ do Docker
COPY apache_conf/000-default.conf /etc/apache2/sites-available/

RUN rm -rf app/cache/* \
	&& rm -rf app/log/* \
	&& chown -R root:www-data app/cache \
	&& chown -R root:www-data app/logs \
	&& chown -R root:www-data app/config/parameters.yml \
	&& chmod -R 775 app/cache \
	&& chmod -R 775 app/logs \ 
	&& chmod -R 775 app/config/parameters.yml \
	&& /etc/init.d/mysql start \
	&& php app/console doctrine:database:create \
	&& php app/console doctrine:schema:update --force \
	&& php app/console cache:clear --env=prod --no-debug \
	&& php app/console assets:install web \
	&& php app/console assetic:dump web --env=prod --no-debug

#Copiar o ficheiro docker-entrypoint.sh para o root do Container
COPY ./docker-entrypoint.sh /
#Indicar que o ficheiro a executar quando o Container iniciar é o docker-entrypoint.sh
ENTRYPOINT /docker-entrypoint.sh
#Atribuir permissões de execução ao ficheiro docker-entrypoint (chmod +x)
RUN chmod +x /docker-entrypoint.sh