<?php
  require_once 'db_config.php';

  if(!isset($_SESSION["userId"])) {
    $templateParams["titolo"] = "EstoteSocial - Home";
    require 'template/Login_base.php';
  } else {
    header("Location:homepage.php");
  }

  include"start.php"
?>