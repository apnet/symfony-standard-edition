Vagrant.configure("2") do |config|
  config.vm.box = "symfony-ubuntu1204-x64"

  # Use https://github.com/covex-nn/vagrant-symfony2 to create "symfony-ubuntu1204-x64" base box
  #
  # config.vm.box_url = "http://vagrantstore.apnet.ru/symfony-ubuntu1204-x64.box"

  config.vm.network :private_network, ip: "127.0.0.2"
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.hostname = "www.local"

  config.vm.provision "shell", path: "vagrant/provision.sh"
end
