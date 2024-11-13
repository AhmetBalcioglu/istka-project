<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    $admin_info = [
        "username" => "admin",
        "password" => "123456"
    ];
    $username = $_POST["username"];
    $password = $_POST["password"];

    trim(htmlspecialchars($username));
    trim(htmlspecialchars($password));

    $errors = [];

    if (empty($username)) {
        $errors[] = "Kullanıcı adı boş bırakılamaz!";
    }

    if (empty($password)) {
        $errors[] = "Şifre boş bırakılamaz!";
    }

    if (count($errors) > 0) {
        $_SESSION["error"] = $errors;
        header("Location: /Login_Page/");
        exit(0);
    } else {
        if ($username == $admin_info["username"] && $password == $admin_info["password"]) {
            $_SESSION["username"] = $username;
            $_SESSION["token"] = "token123";
            if (isset($_POST["remember"])) {
                setcookie("remember", true, time() + 3600, "/");
            } else {
                setcookie("remember", false, time() - 1, "/");
            }
            unset($_SESSION["error"]);

            header("Location: /Login_Page/admin");
            exit(0);
        } else {
            $_SESSION["error"] = "Kullanıcı adı veya sifre yanlis!";
            header("Location: /Login_Page/");
            exit(0);
        }

    }

}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>

</body>

</html>