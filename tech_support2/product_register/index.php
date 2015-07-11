<?php
session_start();

// Get your database connection file
require('../model/database.php');

require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        // Skip login requirement if customer is already logged in
        // Determine the login status in the if statement below
        if (isset($_SESSION['logged_in'])) {
            $action = 'display_register';
        } else {
            $action = 'display_login';
        }
    }
}

switch ($action) {
    case 'display_login':
        include('customer_login.php');
        break;
    case 'login':
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if ($email == NULL || $email == FALSE ||
            $password == NULL || $password == FALSE) {
            $message = 'Email or password formatted incorrectly.';
            include('customer_login.php');
            break;
        }
        
        $customer = login_customer($email, $password);

        if ($customer) {
            $_SESSION['customer'] = $customer;
            $_SESSION['logged_in'] = TRUE;

            $products = get_products();
            include('product_register.php');
        }
        else {
            $message = 'Email or password don\'t match any accounts';
            include('customer_login.php');
        }
        
        break;
    case 'display_register':
        // Before moving to the registration page,
        // get the customer information retreived during
        // the login process (part of the session)
        if (isset($_SESSION['logged_in'])) {
            $customer = $_SESSION['customer'];
            $products = get_products();
            include('product_register.php');
        }
        else {
            include('customer_login.php');
        }

        break;
    case 'register_product':
        // Before registering the product get the
        // customer information retreived during
        // the login process (part of the session)
        
        if (isset($_SESSION['logged_in'])) {
            $customer = $_SESSION['customer'];
            $product_code = filter_input(INPUT_POST, 'product_code');
            add_registration($customer['customerID'], $product_code);
            $message = "Product ($product_code) was registered successfully.";
            include('product_register.php');
        }
        else {
            include('customer_login.php');
        }

        break;
    case 'logout':
        // Build the logout functionality here
        unset($_SESSION['customer']);
        unset($_SESSION['logged_in']);
        session_destroy();

        include('customer_login.php');
        break;
}