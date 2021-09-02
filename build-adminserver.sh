apt-get update
apt-get install -y apache2 php libapache2-mod-php php-mysql

cp /vagrant/admin-site.conf /etc/apache2/sites-available/
# activate our website configuration ...
a2ensite admin-site
# ... and disable the default website provided with Apache
a2dissite 000-default
# Reload the webserver configuration, to pick up our changes
service apache2 reload