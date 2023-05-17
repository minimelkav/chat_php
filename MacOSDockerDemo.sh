#!/bin/bash
# Check if docker is installed
docker --version > /dev/null 2>&1
if [ $? -ne 0 ]; then
  echo "Docker is not installed. Downloading and installing it now..."
  # Download docker from Docker website
  curl -L https://download.docker.com/mac/stable/Docker.dmg -o ~/Downloads/Docker.dmg
  # Install docker
  hdiutil attach ~/Downloads/Docker.dmg
  cp -R /Volumes/Docker/Docker.app /Applications
  hdiutil detach /Volumes/Docker
fi
# Clone the GitHub repository
git clone https://github.com/minimelkav/chat_php.git
# Rename the folder
mv chat_php php_chat
# Grant write permission to chat.txt file
chmod u+w php_chat/chat.txt
# Build and run the PHP chat application with docker compose
cd php_chat
docker-compose up -d
cd ..
# Open the web browser and point it to the JOIN page
open http://localhost:8080/join.php
