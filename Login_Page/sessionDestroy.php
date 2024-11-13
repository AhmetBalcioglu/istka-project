<?php

session_start();
session_unset();
session_destroy();
header("Location: /Login_Page/");
exit(0);

?>