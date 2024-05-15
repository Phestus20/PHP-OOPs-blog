<?php
 session_start(); // we start 
 session_unset(); // we unset everything 
 session_destroy();// we destroy all
 unset($_SESSION['username']);
 echo " <script>window.open('http://localhost/security/public/login','_self')</script>"

?>