<?php
// get the username and message from the POST request
$username = $_POST["username"];
$message = $_POST["message"];

// create a chat.txt file if it does not exist
if (!file_exists("chat.txt")) {
    $file = fopen("chat.txt", "w");
    fclose($file);
}

// append the username and message to the chat.txt file
$file = fopen("chat.txt", "a");
// get the current date and time
$date = date("Y-m-d H:i:s");
// sanitize the username and message to prevent XSS attacks
$username = htmlspecialchars($username);
$message = htmlspecialchars($message);
// write the username, message, and date to the chat.txt file in CSV format
fputcsv($file, array($username, $message, $date));
fclose($file);

// create a chat.html file if it does not exist
if (!file_exists("chat.html")) {
    $file = fopen("chat.html", "w");
    fwrite($file, "<html><head><style>body {font-family: Arial;} .me {color: blue;} .you {color: green;}</style></head><body></body></html>");
    fclose($file);
}

// read the chat.txt file and convert it to an array of arrays
$file = fopen("chat.txt", "r");
$chat = array();
while (($line = fgetcsv($file)) !== false) {
    $chat[] = $line;
}
fclose($file);

// reverse the order of the chat array so that the newest messages are first
$chat = array_reverse($chat);

// overwrite the chat.html file with the updated chat messages
$file = fopen("chat.html", "w");
fwrite($file, "<html><head><style>body {font-family: Arial;} .me {color: blue;} .you {color: green;}</style></head><body>");
// loop through the chat array and write each message as a paragraph element with a class attribute based on the username
foreach ($chat as $line) {
    // get the username, message, and date from the line array
    $username = $line[0];
    $message = $line[1];
    $date = $line[2];
    // check if the username is user1 or Bing and set the class accordingly
    if ($username == "user1") {
        $class = "me";
    } else {
        $class = "you";
    }
    // write the paragraph element with the username, message, date, and class to the chat.html file
    fwrite($file, "<p class='$class'><b>$username</b> ($date): $message</p>");
}
fwrite($file, "</body></html>");
fclose($file);

// display the chat.html file
readfile("chat.html");
?>
