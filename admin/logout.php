<?php
session_start();

/* Session ke tamam data delete */
session_unset();
session_destroy();

/* Login page par redirect */
header("Location: login.php");
exit;
