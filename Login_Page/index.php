<?php
session_start();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="text-center" style="background-color: rgb(180,180,180);">
    <div class="container mt-5">
        <form class="form-signin" method="POST" action="/Login_Page/login">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72"
                height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputUsername" class="sr-only text-start">Username</label>
            <input type="text" id="inputUsername" name="username" class="form-control mb-2" placeholder="Username"
                autofocus autocomplete="off" value="<?php echo isset($_COOKIE["remember"]) ? "admin" : "" ?>">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password"
                value="<?php echo isset($_COOKIE["remember"]) ? "123456" : "" ?>">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me" name="remember" <?php echo isset($_COOKIE["remember"]) ? "checked" : "" ?>> Remember me
                </label>
            </div>
            <p class="text-danger"><?php echo isset($_SESSION["error"]) ?
                is_array($_SESSION["error"]) ? implode("<br>", $_SESSION["error"]) : $_SESSION["error"]
                : null;
            unset($_SESSION["error"]); ?></p>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2024</p>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>