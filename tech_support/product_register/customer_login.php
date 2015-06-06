<?php include '../view/header.php'; ?>
<main>

    <h2>Customer Login</h2>
    <p>You must login before you can register a product.</p>
    <?php echo ($message) ? '<p class="error">' . $message . '</p>' : "" ?>
    <!-- Build a login form similar to the one shown in the exam directions -->
    <form action="." method="post">
    	<label for="email">Email: </label>
    	<input type="email" name="email" id="email" placeholder="johndoe@gmail.com">
    	<input type="hidden" name="action" value="logging_in">
    	<input type="submit" value="Login">
    </form>
</main>
<?php include '../view/footer.php'; ?>