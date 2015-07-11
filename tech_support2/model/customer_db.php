<?php
// Create a function to login the customer and retrieve the customer data 
// when the login is successful
require('password.php');

function login_customer($email,$password) {
	$db = db_connect();

	$query = 'SELECT * FROM customers WHERE email = :email';
	$stmt = $db->prepare($query);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt->closeCursor();

	if (password_verify($password, $user['password'])) {
		return $user;
	}
	else {
		return false;
	}
}