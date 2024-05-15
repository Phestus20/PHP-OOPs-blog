<?php
@session_start();
//path to all functions
require_once("../private/includes/functions.php");
echo " still on our index page<br><br>".isset($_SESSION['username']) ? $_SESSION['username'] : '';
echo"<br><br>" . $_GET['url'] ;
// get the name of the page
$page = isset($_GET['url']) ? $_GET['url'] : "home";//you can leave the home page empty so when there is no url it should not find anything
//path to our folder
$folder = "../private/includes/";//2steps upward
// get all files from folder
$files = glob($folder . "*.php");
// we are adding the extension
$file_name = $folder . $page . ".php";
//check if the file exist in the array b4 we include it
if (in_array($file_name, $files)){
    include($file_name);
}else{
    include "includes/404.php";
}