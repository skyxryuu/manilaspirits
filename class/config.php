<?php
session_start();
ob_start();
include 'class.php';
include 'init.php';
$data = new db();

if ($_SERVER['HTTPS'] != 'on') {
    header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    exit;
  }
