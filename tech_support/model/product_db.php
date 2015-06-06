<?php

// Get all the products for the registration dropdown list
function get_products() {
	$db = db_connect();

    $query = 'SELECT productCode, name FROM products ORDER BY name';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}
