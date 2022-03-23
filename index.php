<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>
<html>
<p>the page to redirected to after login</p>
<button><a href="./logout.php">LogOut</a></button>
</html>
