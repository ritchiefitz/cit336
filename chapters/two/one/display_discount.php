<?php

    $product_description = filter_input(INPUT_POST, "product_description");
    $list_price = filter_input(INPUT_POST, "list_price");
    $discount_percent = (filter_input(INPUT_POST, "discount_percent")) / 100;

    $discount_amount = $list_price * $discount_percent;
    $discount_price = $list_price - $discount_amount;

    // Question does it need to equal the book exactly.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span><?php printf("$%.2f", $list_price); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php printf("%.0f%%", ($discount_percent * 100)); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php printf("$%.2f", $discount_amount); ?></span><br>

        <label>Discount Price:</label>
        <span><?php printf("$%.2f", $discount_price); ?></span><br>
    </main>
</body>
</html>