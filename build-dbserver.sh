      #script ffile to set up the sql server Coin Holder 
      apt-get update

      export MYSQL_PWD='insecure_mysqlroot_pw'

      echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
      echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections

      apt-get -y install mysql-server

      #create database called Coin Holder 
      echo "CREATE DATABASE coinHolder;" | mysql

      # create a database user "admin" with the given password which is a random hash.
      echo "CREATE USER 'admin'@'%' IDENTIFIED BY '3c15b90868025dae79a5671ca3718085';" | mysql

      # grant all permission of coin holder to admin
      echo "GRANT ALL PRIVILEGES ON coinHolder.* TO 'admin'@'%'" | mysql
      
      #password set up
      export MYSQL_PWD='3c15b90868025dae79a5671ca3718085'

      cat /vagrant/setup-database.sql | mysql -u admin coinHolder

      sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf

      service mysql restart