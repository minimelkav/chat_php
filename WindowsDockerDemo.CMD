@echo off
rem Check if winget is installed
winget --version >nul 2>&1
if %errorlevel% neq 0 (
  echo WINGET is not installed. Downloading and installing it now...
  rem Download winget from GitHub
  bitsadmin /transfer winget https://github.com/microsoft/winget-cli/releases/download/v1.2.4142/Microsoft.DesktopAppInstaller_8wekyb3d8bbwe.appxbundle %temp%\winget.appxbundle
  rem Install winget
  Add-AppxPackage -Path %temp%\winget.appxbundle
)

rem Check if docker is installed
docker --version >nul 2>&1
if %errorlevel% neq 0 (
  echo DOCKER is not installed. Installing it with WINGET now...
  rem Install docker with winget
  winget install -e --id Docker.DockerDesktop --accept-source-agreements --accept-package-agreements
)

rem Clone the GitHub repository
git clone https://github.com/minimelkav/chat_php.git

rem Rename the folder
rename chat_php php_chat

rem Grant write permission to chat.txt file
icacls php_chat\chat.txt /grant Everyone:(F)

rem Build and run the PHP chat application with docker compose
cd php_chat
docker-compose up -d
cd ..

rem Open the web browser and point it to the JOIN page
start http://localhost:8080/join.php
