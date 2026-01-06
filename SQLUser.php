<?php
$mysqli = new mysqli('localhost', 'root', 'password');
if ($mysqli->connect_error) {
	die('Connect error: ' . $mysqli->connect_error);
}

$sql = "CREATE USER 'Newn'@'localhost' IDENTIFIED BY 'Newn123';";
if ($mysqli->query($sql)) {
	echo 'User created successfully.';
} else {
	echo 'Error creating user: ' . $mysqli->error;
}

$mysqli->close();
?>