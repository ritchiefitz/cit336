<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<?php include('../view/header.php'); ?>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $_SESSION['investment_f']; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $_SESSION['yearly_rate_f']; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $_SESSION['years']; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $_SESSION['future_value_f']; ?></span><br>

        <label>Compound Monthly:</label>
        <span><?php echo $_SESSION['using_compound_interest']; ?></span><br>
    </main>
<?php include('../view/footer.php'); ?>