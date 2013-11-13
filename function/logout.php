<?php
session_start();
require_once("gadget.php");
//update_log("---> Logout",get_client_ip(),$_SESSION['username'],"log_out");
session_destroy();
header('Location: ../index.php');

?>