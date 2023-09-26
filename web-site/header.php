<div id="header">
    <div id="username_container">
        <?= "Hello, " . ($_SESSION["user_id"] ?? "stranger") . "!"?>
    </div>
    <?php
        if ($_SESSION["user_id"]):
    ?>
    <div id="logout_container">
        <form method="post" action="logout.php">
            <input id="submit-button" type="submit" class="form_input" value="Log Out">
        </form>
    </div>
    <?php endif;?>

</div>