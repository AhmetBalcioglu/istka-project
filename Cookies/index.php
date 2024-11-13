<?php

$lang = "tr";


if (isset($_COOKIE["lang"])) {
    $lang = $_COOKIE["lang"];
}

if (isset($_GET["lang"])) {
    $lang = $_GET["lang"];
    setcookie("lang", $lang, time() + 3600, "/");
}
var_dump($_COOKIE);

$translation = include "language/$lang.php";
var_dump($translation);
var_dump($_SERVER["PHP_SELF"]);
?>


<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: rgb(180,180,180);">

    <div class="container">
        <div class="row mt-5">
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
                <label for="lang" class="form-label"><?php echo $translation["language_select"]; ?></label>
                <select class="form-select" id="lang" name="lang">
                    <option disabled>--<?php echo $translation["Select"]; ?>--</option>
                    <option <?php echo $lang == "tr" ? "selected" : null; ?> value="tr">
                        <?php echo $translation["Turkish"]; ?>
                    </option>
                    <option <?php echo $lang == "en" ? "selected" : null; ?> value="en">
                        <?php echo $translation["English"]; ?>
                    </option>
                </select>
                <button type="submit" class="btn btn-primary mt-3"><?php echo $translation["Send"]; ?></button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>