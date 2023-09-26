<?php
require_once './boot.php';

class User
{
    public function __construct(public string $login, public string $password)
    {
    }

    function check_password(string $password): bool {
        return ~$password === $this->password;
    }
}

$login = $_POST["login"];
$password = $_POST["password"];

if ($_POST["sign-in"] ?? false) {
    $user = get_user_principal($login);
    if ($user == null) {
        $_SESSION["error"] = "Неправильный логин";
        echo $_SESSION["error"];
        header('Location: /itmo-web-lab4/web-site/auth.php');
        die;
    }

    if ($user->check_password(utf8_decode($password))) {
        $_SESSION['user_id'] = $login;
        header('Location: /itmo-web-lab4/web-site/index.php');
        die;
    }

    $_SESSION["error"] = "Неправильный пароль";
    header('Location: /itmo-web-lab4/web-site/auth.php');
    die;

} elseif ($_POST["sign-up"] ?? false) {
    $user = get_user_principal($login);
    if ($user != null) {
        $_SESSION["error"] = "Логин уже существует";
        header('Location: /itmo-web-lab4/web-site/auth.php');
        die;
    }

    $password = utf8_encode(~$password);

    $stmt = pdo()->prepare("INSERT INTO site.user(login, password) VALUES (:login, :password)");
    $stmt->execute(["login" => $login, "password" => $password]);

    $_SESSION['user_id'] = $login;
    header('Location: /itmo-web-lab4/web-site/index.php');
    die;
}


function get_user_principal(string $login): User|null
{
    $stmt = pdo()->prepare("SELECT * FROM site.user WHERE login = :login");
    $stmt->execute(["login" => $login]);
    while ($row = $stmt->fetch()) {
        return new User(
            $login,
            utf8_decode($row["password"])
        );
    }
    return null;
}
?>
