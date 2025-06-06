<?php

include_once 'config.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tempPass = $_POST['password'];
    $password = password_hash($tempPass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)";
    $sqlQuery = $conn->prepare($sql);

    $sqlQuery->bindParam(":name", $name);
    $sqlQuery->bindParam(":username", $username);
    $sqlQuery->bindParam(":email", $email);
    $sqlQuery->bindParam(":password", $password);
    var_dump($password);


    echo "Data saved successfully <br>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add user</title>
</head>

    <form action="add.php" method="POST">
        <input type="text" name="name" placeholder="Name"><br>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="submit" name="submit" value="Add"></input>
    </form>
    
</body>
<a href="dashboard.php">Added users</a>
</html>  