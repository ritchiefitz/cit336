<?php

    $product_description = $$product_descriptionErr = "";
    $list_price = $$list_priceErr = "";
    $discount_percent = $$discount_percentErr = "";
    $discount_amount = $$discount_amountErr = "";
    $discount_price = $$discount_priceErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Entered";

        if (empty($_POST["product_description"])) {
            echo "Product description is required!";
            $product_descriptionErr = "Product description is required!";
        }
        else {
            $product_description = test_input(filter_input(INPUT_POST, "product_description"));
        }

        echo "Got Product Description";

        if (empty($_POST["list_price"])) {
            echo "List price is required!";
            $list_priceErr = "List price is required!";
        }
        elseif (!filter_var($_POST["list_price"], FILTER_VALIDATE_FLOAT)) {
            echo "List price must be a number!";
            $list_priceErr = "List price must be a number!";
        }
        else {
            $list_price = test_input(filter_input(INPUT_POST, "list_price"));
        }

        if (empty($_POST["discount_percent"])) {
            echo "Discount is required!";
            $discount_percentErr = "Discount is required!";
        }
        elseif (!filter_var($_POST["discount_percent"], FILTER_VALIDATE_INT)) {
            echo "Discount must be a non-decimal value like 10, 25, 50, or etc...";
            $discount_percentErr = "Discount must be a non-decimal value like 10, 25, 50, or etc...";
        }
        else {
            $validate = test_input(filter_input(INPUT_POST, "discount_percent", FILTER_VALIDATE_INT));
            $discount_percent = $validate / 100;
        }

        $discount_amount = $list_price * $discount_percent;
        $discount_price = $list_price - $discount_amount;
    }

    function test_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

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