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
<div class="main">
    <div class="form_container">
        <div class="form_name_container">Заказ</div>
        <form action="user-form.php" method="post" class="form">
            <input type="text" id="name" name="name" placeholder="Имя" class="form_input" required="required">
            <input type="text" id="surname" name="surname" placeholder="Фамилия" class="form_input" required="required">
            <input type="text" id="patronymic" name="patronymic" placeholder="Отчество" class="form_input">
            <input type="text" id="address" name="address" placeholder="Адрес доставки" class="form_input" required="required">
            <input type="tel" id="telephone" name="telephone" placeholder="Номер телефона" class="form_input" required="required">
            <input type="email" id="email" name="email" placeholder="Адрес электронной почты" class="form_input" required="required">
            <textarea id="message" name="message" class="form_textarea form_input" placeholder="Комментарий"></textarea>
            <div id="goods-label" class="form_name_container">Товары</div>
            <select name="goods[]" size="5" multiple=multiple class="form_select form_input" >
                <?php
                $stmt = pdo()->prepare("SELECT * FROM site.good");
                $stmt->execute();
                while ($row = $stmt->fetch()):
                ?>
                <option value="<?= $row["name"] ?>" class="form_option"><?= $row["localized_name"]; ?></option>
                <?php endwhile; ?>
            </select>
            <input id="submit-button" type="submit" class="form_button form_input" value="Отправить">
        </form>
    </div>
</div>
<?php require './footer.php' ?>
</body>
</html>