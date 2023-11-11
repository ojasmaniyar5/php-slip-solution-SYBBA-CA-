<?php
session_start();

if(empty($_SESSION['c']))
	$_SESSION['c']=1;
else
	$_SESSION['c']++;

echo"No. Of Times Visited Webpage : ".$_SESSION['c'];
?>
