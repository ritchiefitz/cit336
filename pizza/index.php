<?php

$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
	include('pizza.php');
}
else if ($action == 'Order') {
	$size = filter_input(INPUT_POST, 'size');
	$meat = filter_input(INPUT_POST, 'meat');
	$toppings = filter_input(INPUT_POST, 'topping', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
	$confirm_order = true;

	include('pizza.php');
}
else {
	echo "Something went wrong.";
}

?>