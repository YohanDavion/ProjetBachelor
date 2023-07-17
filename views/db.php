<?php

$host = 'db4free.net:3306';
$name = 'projetweb_bsidn';
$user = 'baptiste';
$password = 'zUr6mq.##AP@EjU';

try {
	$pdo = new PDO("mysql:host=$host;dbname=$name;charset=utf8", $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
}