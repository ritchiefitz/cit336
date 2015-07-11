<?php 
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

  <!-- the head section -->
  <head>
    <title>SportsPro Technical Support</title>
    <link rel="stylesheet" type="text/css"
          href="/tech_support2/main.css">
  </head>

  <!-- the body section -->
  <body>
    <header>
      <h1>SportsPro Technical Support</h1>
      <p>Sports management software for the sports enthusiast</p>

      <?php if (!isset($_SESSION['logged_in'])): ?>
        <a class="log-link" href="/tech_support2/product_register?action=login">Login</a>
      <?php else: ?>
        <a class="log-link" href="/tech_support2/product_register?action=logout">Logout</a>
      <?php endif; ?>

      <nav>
        <ul>
          <li><a href="/tech_support2/">Home</a></li>
        </ul>
      </nav>
    </header>
