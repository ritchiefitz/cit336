<?php
require '../library/library.php';

$action = filter_input(INPUT_POST, 'action');

if ($action === 'Register') {
	$username = filter_input(INPUT_POST, 'username');
	$password = filter_input(INPUT_POST, 'password');

	$hashedPassword = hashPassword($password);

	echo $hashedPassword;
}
?>