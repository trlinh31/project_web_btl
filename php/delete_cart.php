<?php
session_start();
unset($_SESSION["cart"]);
header("Location: {$_SERVER['HTTP_REFERER']}");
