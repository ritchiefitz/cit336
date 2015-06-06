<?php

/* 
 * What you will need
 *   1. The product_register application should default to the customer_login view
 *   2. If the email address is not provided, make them enter one
 *   3. Check if the email entered is valid, if so get the user information from 
 *       the database
 *   4. Send the logged-in user to the product registration page
 *   5. Automatically enter the user's name in the product registration form
 *   6. When the page loads the product list should be a drop down menu of 
 *       products built from a resultset queried out of the database
 *   7. If the product registration data is submitted, register the product
 *   8. If the product is registered successfully, confirm it to the user.
 */

// Get your db connection file, be sure it has a new connection to the
// tech support database
require('../model/database.php');

// Get the models needed - work will need to be done in both
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');

$message = NULL;
$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'customer_login';
    }
}

if ($action == 'customer_login') {
	include('customer_login.php');
} else if ($action == 'logging_in') {
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

	if ($email == NULL || $email == FALSE) {
		$message = 'Must enter a valid email.';
		include('customer_login.php');
	} else {
		$customer = get_customer_by_email($email);

		if ($customer == FALSE) {
			$message = 'Email does not match any existing user. Please try again.';
			include('customer_login.php');
		}
		else {
			$products = get_products();
			include('product_register.php');
		}
	}
} else if ($action == 'register_product') {
	$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
	$product_code = filter_input(INPUT_POST, 'product');

	if ($customer_id == NULL || $customer_id == FALSE
		|| $product_code == NULL || $product_code == FALSE) {
		$message = 'There was an error please try again.';
		include('product_register.php');
	} else {
		$response = add_registration($customer_id, $product_code);

		if ($response == FALSE) {
			$message = 'Product ($product_code) is already registered to user.';
			include('product_register.php');
		} else {
			$message = "Product ($product_code) was registered successfully.";
			include('product_register.php');
		}
	}
}