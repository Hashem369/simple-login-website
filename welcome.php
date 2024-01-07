<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
    </head>
    <style>
        body {
            background-color: lightsalmon;
        }
        .welcome-header {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: xxx-large;
            font-weight: bold;
            font-family: "Arial";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            flex-direction: column;
        }
        .welcome-header input {
            font-size: large;
            margin-top: 20px;
            padding: 10px;
        }
    </style>
    <body>
        <form class="welcome-header" action="" method="post">
            <?php
            session_start();
            echo "Welcome " . $_SESSION["username"];
            ?>
            <input type="submit" value="logout" name="logout" >
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
    if (isset($_POST["logout"])) {
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        unset($_SESSION["email"]);
        header("Location: index.php");
    }
?>