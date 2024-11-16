<?php
$file = file_get_contents("text.txt");
// readfile("text.txt");

/*
$myFile = fopen("text.txt", "r");
echo fread($myFile, filesize("text.txt"));
fclose($myFile);
*/
$file = fopen("text.txt", "r");
echo fread($file, filesize("text.txt"));
fclose($file);


?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: rgb(120,120,120);">

</body>

</html>