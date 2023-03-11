<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Logo Di Title -->
    <link rel="icon" href="asset/icon/logo.svg">
    <!-- Link Css -->
    <link rel="stylesheet" href="style-login.css">
    <link rel="stylesheet" href="asset/style.css">
    <!-- Link Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="backround">
        <p class="description">LOGIN</p>
        <form action="prosesLogin.php" method="post" class="login">
            <table class="tb-login" cellspacing="15">
                <tr>
                    <td><img src="asset/icon/username.svg" class="icon"></td>
                    <td><input type="text" name="username" autocomplete="off" placeholder="username/nisn" class="input" required></td>
                </tr>
                <tr>
                    <td><img src="asset/icon/password.svg" class="icon"></td>
                    <td><input type="password" name="password" autocomplete="off" placeholder="password" class="input" required></td>
                </tr>
                <tr>
                    <td colspan=2 class="button"><button class="btn-submit">LOGIN</button></td>                            
                </tr>
            </table>
        </form>
</div>
</body>
</html>