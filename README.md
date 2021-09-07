# COSC349 Assignment One 
### Setting Up Crypto Holder on Your Device

This application initialises three virtual machines (VMs) to run a simple cryptocurrency exchange platform. One VM is dedicated to running a database, one runs a user webpage, and one runs an administrator/activity log webpage. The user website makes requests to the database to add users and coins, and the admin webpage is used to monitor user activity and alter the value of the coins.

**To run this application, you will first need up-to-date versions of both Vagrant and VirtualBox.**

You can download Vagrant at 
> https://www.vagrantup.com/downloads

You can download VirtualBox at 
> https://www.virtualbox.org/wiki/Downloads

Once you have these installed, using the command line in the directory you wish to store this application, call:

> git clone https://github.com/Nexus112/COSC349-asgn1.git 

Now you have all the files set up, you are ready to go. In the same directory simply use the command

> vagrant up

The initialisation process will begin, and your virtual machines will be set up.

The customer website will appear at http://127.0.0.1:8080/ 

The admin side website will appear at http://127.0.0.1:8081/ 

> The username and password for the admin account is: Admin

### The User Side:
Go to http://127.0.0.1:8080

Click Login/Register. Either log in with a default account (such as Admin), or register by inputting a new username and a password in the "Register" section. If you register a new account, you will then need to log in.

Once logged in, you may use the buttons on the webpage to add, delete, and alter the coins you have in your wallet. Simple!

### The Admin Side

Head to http://127.0.0.1:8081

Here, you will be able to see details about all user transactions, including the username of the account requesting the transaction, the name of the coin being bought or sold, the quantity of the coin bought or sold, and the timestamp of the transaction.To update the table, simply click "Update Table".

