<?php include '../view/header.php'; ?>
<main class="register-content">

    <h2>Register Product</h2>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php else: ?>
    	<form action="." method="post">
	    	<label>Customer:</label>
	    	<span><?php echo $customer['firstName'] . " " . $customer['lastName']; ?></span>
	    	<br>
	    	<label for="product">Product:</label>
	    	<select name="product" id="product">
		        <?php foreach ($products as $product) : ?>
		            <option value="<?php echo $product['productCode']; ?>">
		                <?php echo $product['name']; ?>
		            </option>
	        	<?php endforeach; ?>
	    	</select>
			<input type="hidden" name="customer_id" value="<?php echo $customer['customerID']; ?>">
			<input type="hidden" name="action" value="register_product">
			<br>
			<br>
	    	<input type="submit" value="Register Product">
		</form>
    <?php endif; ?>

</main>
<?php include '../view/footer.php'; ?>