<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>

<?php

    define(SALES_TAX, .08);

    $product_description = $product_descriptionErr = null;
    $list_price = $list_priceErr = null;
    $discount_percent = $discount_percentErr = null;
    $discount_amount = $discount_amountErr = null;
    $discount_price = $discount_priceErr = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["product_description"])) {
            // echo "Product description is required!";
            $product_descriptionErr = "Product description is required!";
        }
        else {
            $product_description = test_input(filter_input(INPUT_POST, "product_description"));
        }

        if (empty($_POST["list_price"])) {
            // echo "List price is required!";
            $list_priceErr = "List price is required!";
        }
        elseif (!filter_var($_POST["list_price"], FILTER_VALIDATE_FLOAT)) {
            // echo "List price must be a number!";
            $list_priceErr = "List price must be a number!";
        }
        else {
            $list_price = test_input(filter_input(INPUT_POST, "list_price"));
        }

        if (empty($_POST["discount_percent"])) {
            // echo "Discount is required!";
            $discount_percentErr = "Discount is required!";
        }
        elseif (!filter_var($_POST["discount_percent"], FILTER_VALIDATE_INT)) {
            // echo "Discount must be a non-decimal value like 10, 25, 50, or etc...";
            $discount_percentErr = "Discount must be a non-decimal value like 10, 25, 50, or etc...";
        }
        else {
            $validate = test_input(filter_input(INPUT_POST, "discount_percent", FILTER_VALIDATE_INT));
            $discount_percent = $validate / 100;
        }

    }

    function test_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    if (isset($product_description) && isset($list_price) && isset($discount_percent)) {
        $discount_amount = $list_price * $discount_percent;
        $discount_price = $list_price - $discount_amount;
        $sales_amount = $discount_price * SALES_TAX;
        $sales_price = $discount_price + $sales_amount;
        ?>
        
        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span><?php printf("$%.2f", $list_price); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php printf("%.0f%%", ($discount_percent * 100)); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php printf("$%.2f", $discount_amount); ?></span><br>

        <label>Discount Price:</label>
        <span><?php printf("$%.2f", $discount_price); ?></span><br><br>

        <label>Sales Tax Rate:</label>
        <span><?php printf("%s%%", SALES_TAX * 100); ?></span><br>

        <label>Sales Tax Amount:</label>
        <span><?php printf("$%.2f", $sales_amount); ?></span><br>

        <b>
            <label>Amount with Tax:</label>
            <span><?php printf("$%.2f", $sales_price); ?></span><br>
        </b>

<?php
    }
    else {
?>
        <label>Product Description:</label>
        <span><?php echo isset($product_description) ? "Fine" : $product_descriptionErr; ?></span><br>

        <label>List Price:</label>
        <span><?php echo isset($list_price) ? "Fine" : $list_priceErr; ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo isset($discount_percent) ? "Fine" : $discount_percentErr; ?></span><br>

<?php 
    }
?>
    </main>
</body>
</html>