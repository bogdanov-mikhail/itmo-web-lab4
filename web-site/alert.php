<?php
if (isset($_SESSION["error"])):
    ?>
    <script>
        alert(<?= '"' . $_SESSION["error"] . '"' ?>);
    </script>
<?php
endif;
$_SESSION["error"] = null;
?>