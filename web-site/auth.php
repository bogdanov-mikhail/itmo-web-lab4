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
<?php require './alert.php'?>
<div class="main">
<div id="auth_form_container" class="form_container">
    <div class="form_name_container">Авторизация</div>
    <form action="auth-form.php" method="post" class="form">
        <input type="text" id="login" name="login" placeholder="Логин" class="form_input" required="required">
        <input type="password" id="password" name="password" placeholder="Пароль" class="form_input" required="required">
        <input id="sign-in-button" name="sign-in" class="form_input form_button" type="submit" value="SIGN IN">
        <input id="sign-up-button" name="sign-up" class="form_input form_button" type="submit" value="SIGN UP">
    </form>
</div>
</div>
<?php require './footer.php' ?>
</body>
</html>
