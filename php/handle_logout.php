<?php
session_start();
unset($_SESSION["user"]);
header("Location: /web_btl/index.php");
