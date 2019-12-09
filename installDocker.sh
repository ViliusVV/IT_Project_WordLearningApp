#!/bin/sh
# Remove docker if installed
sudo apt-get remove docker docker-engine docker.io containerd runc
# Update
sudo apt-get update
# Install required packages
sudo apt-get -y install apt-transport-https ca-certificates curl gnupg-agent software-properties-common
# Add docker PGP key
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
# Add latest docker repository
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
# Update again
sudo apt-get update
# Install docker
sudo apt-get -y install docker-ce docker-ce-cli containerd.io
# Install docker compose
sudo apt-get -y install docker-compose
# Test out docker
sudo docker run hello-world
# Set fancy url
echo -e "127.0.0.1\tzodynas.proj.kt" | sudo tee -a /etc/hosts
# Run project
sudo docker-compose up -d