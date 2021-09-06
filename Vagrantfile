# vagrant file for Coin Holder
Vagrant.configure("2") do |config|
  
  config.vm.box = "ubuntu/xenial64"

  #creating the first webserver
  config.vm.define "webserver" do |webserver|
    
    #establish host name 
    webserver.vm.hostname = "webserver"
    
    #user server on host 8080 
    webserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
    
    #connecting private netowrk for the database
    webserver.vm.network "private_network", ip: "192.168.2.11"

    webserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
    
    # using the user server script to build the VM
    webserver.vm.provision "shell", path: "build-userserver.sh"
      
  end

  # creating the database server VM
  config.vm.define "dbserver" do |dbserver|
    
    #establish host name 
    dbserver.vm.hostname = "dbserver"
    
    #add the server on the prvate network 
    dbserver.vm.network "private_network", ip: "192.168.2.12"

    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
    
    # using the db server script to build the VM
    dbserver.vm.provision "shell", path: "build-dbserver.sh"
  end

  #creatig the admin server VM 
  config.vm.define "adminserver" do |adminserver|
   
    #establish host name 
    adminserver.vm.hostname = "adminserver"
    
    #admin server on host 80801
    adminserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"
    
    #connecting private netowrk for the database
    adminserver.vm.network "private_network", ip: "192.168.2.13"

    adminserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    # using the admin server script to build the VM
    adminserver.vm.provision "shell", path: "build-adminserver.sh"
      
  end

end

#  LocalWords:  webserver xenial64
