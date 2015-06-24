<?php include('../view/header.php'); ?>
    <main>
    <h1>Future Value Calculator</h1>
    
    <?php if (!empty($error_message)): ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="." method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <select name="investment" id="investment">
                <?php echo $investment_options; ?>
            </select><br>

            <label>Yearly Interest Rate:</label>
            <select name="interest_rate" id="interest_rate">
                <?php echo $interest_options; ?>
            </select><br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo $years; ?>"/><br>

            <label>Compound Interest Monthly:</label>

            <!-- If checked value of 1 will be true -->
            <input type="checkbox" name="compound_interest" value="1">
            <br>
        </div>

        <input type="hidden" name="action" value="display_results">

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br>
        </div>

    </form>
    </main>
<?php include('../view/footer.php'); ?>