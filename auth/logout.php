<?php
require_once "../includes/header.php";
session_start();
session_unset();
session_destroy();
header("Location: ".APPURL);