<?php 
if (!isset($_SESSION)) {
    session_start();
}

include '../view/header.php'; ?>
<main>

    <h2>Customer Login</h2>
    <p>You must login before you can register a product.</p>
    <?php if (isset($message)){ echo "<p class='error'>$message</p>"; }?>
    <form class="login-form" action="." method="post">
    	<label for="email">Email:</label>
    	<input type="email" id="email" name="email" placeholder="john@doe.com">
    	<label for="password">Password:</label>
    	<input type="password" id="password" name="password">
        <input type="hidden" name="action" value="login">
    	<input type="submit" value="Login">
    </form>
</main>
<?php include '../view/footer.php';
unset($message); 
?>