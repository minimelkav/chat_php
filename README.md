# PHP Chat

![License](https://img.shields.io/github/license/minimelkav/chat_php)
![Version](https://img.shields.io/github/v/release/minimelkav/chat_php)
![Status](https://img.shields.io/github/workflow/status/minimelkav/chat_php/PHP%20Composer)

PHP Chat is a simple web-based chat application built with PHP, JS, and HTML. It allows users to join the chat with a username and chat with Bing (or other users if they have any).

## Features

- Allows users to join the chat with a username
- Displays the chat messages in reverse chronological order with timestamps
- Enables or disables the bounce effect of the chat window with a checkbox
- Saves the chat history to a file and refreshes the chat window smoothly
- Sanitizes the user input to prevent XSS attacks

## Requirements

- A web server that supports PHP, JS, and HTML (such as Apache HTTP Server)
- A web browser that supports JS and HTML (such as Chrome or Firefox)
- Docker and docker compose (optional)

## Installation

### Without Docker

- Download or clone this repository to your web server's document root (such as /var/www/html)
- Rename the folder to php_chat (or any name you prefer)
- Make sure the web server has write permission to the chat.txt file
- Access the chat application from your web browser by visiting http://localhost/php_chat/join.php (or http://your_server_name/php_chat/join.php)

### With Docker

- Clone this repository to your local machine using the `git clone https://github.com/minimelkav/chat_php.git` command.
- Rename the folder to php_chat (or any name you prefer).
- Make sure the web server has write permission to the chat.txt file.
- In the root directory of the folder, run the `docker-compose up -d` command. This will build and run your PHP chat application in a Docker container.
- Access the chat application from your web browser by visiting http://localhost:8080/join.php (or http://your_server_name:8080/join.php).

## Usage

- Enter your username and click Join
- Type your message and click Send
- Check or uncheck the Bounce checkbox to enable or disable the bounce effect
- Enjoy chatting with Bing (or other users if you have any)

## Screenshots

![Join](join.png)
![Chat](chat.png)
![Bounce](bounce.gif)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
