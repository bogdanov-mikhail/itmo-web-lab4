<?php
    require './boot.php';

    if (!is_auth()) {
        header('Location: /itmo-web-lab4/web-site/auth.php');
        die;
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAB 4</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php require './header.php' ?>
<div id="main">
    <div id="main-form">
        <div id="user-form-name">Заказ</div>
        <form action="user-form.php" method="post" id="main-form">
            <input type="text" id="name" name="name" placeholder="Имя" class="user-form" required="required">
            <input type="text" id="surname" name="surname" placeholder="Фамилия"
                   class="user-form" required="required">
            <input type="text" id="patronymic" name="patronymic"
                   placeholder="Отчество" class="user-form">
            <input type="text" id="address" name="address"
                   placeholder="Адрес доставки" class="user-form"
                   required="required">
            <input type="tel" id="telephone" name="telephone"
                   placeholder="Номер телефона" class="user-form"
                   required="required">
            <input type="email" id="email" name="email"
                   placeholder="Адрес электронной почты" class="user-form"
                   required="required">
            <textarea id="message" name="message" class="user-form" placeholder="Комментарий"></textarea>
            <div id="goods-label">Товары</div>
            <select name="goods[]" size="5" multiple=multiple class="user-form" id="goods">
                <?php
                $stmt = pdo()->prepare("SELECT * FROM site.good");
                $stmt->execute();
                while ($row = $stmt->fetch()):
                ?>
                <option value="<?= $row["name"] ?>" class="good"><?= $row["localized_name"]; ?></option>
                <?php endwhile; ?>
            </select>
            <input id="submit-button" type="submit" class="user-form" value="Отправить">
        </form>
    </div>
</div>
<?php require './footer.php' ?>
</body>
</html>