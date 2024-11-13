<?php
session_start();
var_dump($_SESSION);
var_dump($_POST);
if (!isset($_SESSION["username"]) || !isset($_SESSION["token"])) {
    echo "Yetkisiz Giriş";
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<p>Welcome Admin</p>

<body style="background-color: rgb(180,180,180);">
    <button onclick="window.location.href='/Login_Page/sessionDestroy'">Çıkış Yap</button>
</body>

</html>