<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to my website</title>
    </head>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Arial";
        }
        form,body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-size: x-large;
            background-color: lightsteelblue;
        }
        form input {
            font-size: large;
            padding: 2px;
        }
        input[type="submit"] {
            padding: 10px;
        }
        form * {
            margin-bottom: 10px;
        }
        .error {
            color: red;
            font-size: x-large;
            font-weight: bold;
            text-align: center;
            padding-bottom: 60px;
        }
    </style>
    <body>
        <form action="index.php" method="post">
            <label for="username">Username : </label>
            <input type="text" name="username" id="username">
            <label for="email">Email : </label>
            <input type="email" name="email" id="email">
            <label for="password">Password : </label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Login" name="btn">
        </form>
        <script>
            let btn = document.querySelector("input[type=submit]");
            btn.onclick = function() {
                this.style.color = "red";
            };
        </script>
    </body>
</html>
<?php
    session_start();
    if (isset($_POST['username'] )&& isset($_POST['password'])
        && isset($_POST["email"])) {
        $user = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $validate = preg_match("/^[a-zA-Z0-9]{3,10}$/",$user);
        if ($validate !== 0&& (strlen($password) > 3 && strlen($password) <= 20)) {
            $_SESSION["username"] = filter_var($user,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            header("Location: welcome.php");
        }elseif ($email !== "" && $user !== "" && $password !== "") {
            echo "<p class='error'>Error : Please Enter A Correct Data</p>";
        }
    }
?>