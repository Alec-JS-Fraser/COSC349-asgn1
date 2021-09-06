#script to build the user server
apt-get update
apt-get install -y apache2 php libapache2-mod-php php-mysql
            
cp /vagrant/user-site.conf /etc/apache2/sites-available/

a2ensite user-site

a2dissite 000-default

service apache2 reload