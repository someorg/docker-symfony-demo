FROM debian
RUN apt-get update && apt-get install -y curl git nginx php5-fpm php5-cli php5-xdebug
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /root
RUN composer create-project -n symfony/framework-standard-edition project
RUN apt-get install -y vim
WORKDIR /root/project
RUN rm -Rf app/cache/*
RUN composer require doctrine/doctrine-fixtures-bundle
RUN apt-get install -y php5-sqlite
RUN apt-get install sqlite3
RUN php app/console generate:bundle --dir=src --namespace=MyNameSpace/MyBundle --no-interaction
RUN mkdir app/data
COPY ["workdir/config.yml","workdir/parameters.yml","workdir/parameters.yml.dist","app/config/"]
RUN php app/console doctrine:database:create
RUN php app/console doctrine:generate:entity --entity MyNameSpaceMyBundle:CMS --format yml --fields="heading:string(length=200) image:text link:text" --no-interaction
RUN php app/console doctrine:schema:update --force
RUN rm -rf src/AppBundle
ENTRYPOINT ["sh","/root/workdir/entrypoint.sh"]
EXPOSE 80
