<?php
session_start();
session_unset();
session_destroy();
header("Location: home.php"); // يرجع للصفحة الرئيسية
exit;
