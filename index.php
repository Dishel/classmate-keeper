<?php 
require_once 'config/session.php';
if (isset($_SESSION["username"])) : header("Location: /views/dashboard/");
else : header("Location: /views/login/");
endif;
