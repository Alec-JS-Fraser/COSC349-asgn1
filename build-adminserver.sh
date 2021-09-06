#sript to build the admin server 
apt-get update
apt-get install -y apache2 php libapache2-mod-php php-mysql

cp /vagrant/admin-site.conf /etc/apache2/sites-available/

a2ensite admin-site

a2dissite 000-default

service apache2 reload