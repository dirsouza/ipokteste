FROM mysql:5.7

RUN chown -R mysql:root /var/lib/mysql/

COPY my.cnf /etc/mysql/conf.d/my.cnf

ADD . /docker-entrypoint-initdb.d

CMD ["mysqld"]

EXPOSE 3306