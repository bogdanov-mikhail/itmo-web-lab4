<?php
require_once './boot.php'
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Auth</title>
</head>
<body>
<?php require './header.php' ?>
<div id="main">
<div id="auth-container" class="main-auth">
    <div id="auth-label">Авторизация</div>
    <form action="auth-form.php" method="post" class="main-auth">
        <input type="text" id="login" name="login" placeholder="Логин" class="auth-form" required="required">
        <input type="password" id="password" name="password" placeholder="Пароль" class="auth-form" required="required">
        <input id="sign-in-button" name="sign-in" class="auth-form" type="submit" value="SIGN IN">
        <input id="sign-up-button" name="sign-up" class="auth-form" type="submit" value="SIGN UP">
    </form>
</div>
</div>
<?php require './footer.php' ?>
</body>
</html>
