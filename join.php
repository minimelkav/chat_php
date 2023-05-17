<?php
// start a session
session_start();
// check if the user has submitted the username
if (isset($_POST["username"])) {
    // store the username in the session variable
    $_SESSION["username"] = $_POST["username"];
    // redirect to the client.html page
    header("Location: client.html");
    exit();
}
?>
<html>
<head>
    <style>
        body {font-family: Arial;}
        input {margin: 10px;}
    </style>
</head>
<body>
    <h1>Welcome to the CRAZY chat!</h1>
    <p>Please enter your username:</p>
    <form action="join.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="submit" value="Join">
    </form>
</body>
</html>
