<?php
// Get the product data
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($product_id == null || $product_id == false
    || $category_id == null || $category_id == false 
    || $code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    try {
            // Add the product to the database  
        $query = 'UPDATE products
                  SET categoryID  = :category_id
                  ,   productCode = :code
                  ,   productName = :name
                  ,   listPrice   = :price
                  WHERE productID = :product_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':product_id', $product_id);
        $success = $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $ex) {
        echo "Error: ". $ex.getMessage();
    }


    // Display the Product List page
    include('index.php');
}
?>