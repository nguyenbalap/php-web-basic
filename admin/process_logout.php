<?php


session_start();
unset($_SESSION['id_admin']);
unset($_SESSION['name_admin']);
unset($_SESSION['level']);


header('location:./root/index.php');