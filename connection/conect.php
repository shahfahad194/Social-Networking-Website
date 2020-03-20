<?php
$mysqli = new mysqli("localhost","id1047298_fahad","kingofdark","id1047298_friendsbooks");
 if($mysqli->connect_error){
	 die("connection database error".$mysqli->connect_error);
 }
?>	