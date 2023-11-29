<?php

require_once 'includes/config_session.inc.php';

unset($_SESSION["loginSuccess"]);
session_destroy();
header("Location: signin.php");