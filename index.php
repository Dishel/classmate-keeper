<?php 
require_once 'config/session.php';
if (isset($_SESSION["usuario"])) : header("Location: views/panel/");
else : header("Location: views/login/");
endif;
