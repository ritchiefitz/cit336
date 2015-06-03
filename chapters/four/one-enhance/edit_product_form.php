<?php
require('database.php');

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

$query = 'SELECT *
          FROM products
          WHERE productID = :product_id';
$statement = $db->prepare($query);
$statement->bindValue(':product_id', $product_id);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();

$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement1 = $db->prepare($query);
$statement1->execute();
$categories = $statement1->fetchAll();
$statement1->closeCursor();

$query = 'SELECT *
          FROM categories
          WHERE categoryID = :category_id';
$statement1 = $db->prepare($query);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$product_category = $statement1->fetch();
$statement1->closeCursor();

?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Edit Product</h1>
        <form action="update_product.php" method="post"
              id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
                <option value="<?php echo $product_category['categoryID']; ?>">
                    <?php echo $product_category['categoryName']; ?>
                </option>
            <?php foreach ($categories as $category) : ?>
                <?php 
                    if ($product_category['categoryID'] == $category['categoryID']) {
                        continue;
                    }
                ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Code:</label>
            <input type="text" name="code" value="<?php echo $product['productCode']; ?>"><br>

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $product['productName']; ?>"><br>

            <label>List Price:</label>
            <input type="text" name="price" value="<?php echo $product['listPrice']; ?>"><br>

            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

            <label>&nbsp;</label>
            <input type="submit" value="Update Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>