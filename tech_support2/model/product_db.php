<?php
function get_products() {
    $db = db_connect();
    $query = 'SELECT * FROM products
              ORDER BY name';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}
