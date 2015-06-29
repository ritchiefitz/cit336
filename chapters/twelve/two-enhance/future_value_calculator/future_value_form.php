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
                <?php
                    if (isset($_SESSION['investment'])) {
                        echo '<option value="'.$_SESSION['investment'].'">'.$_SESSION['investment'].'</option>';
                    }
                ?>
                <?php foreach ($investment_options as $investment_option): ?>
                    <?php
                        if ($_SESSION['investment'] == $investment_option) {continue;}
                        echo '<option value="'.$investment_option.'">'.$investment_option.'</option>';
                    ?>
                <?php endforeach; ?>
            </select><br>

            <label>Yearly Interest Rate:</label>
            <select name="interest_rate" id="interest_rate">
                <?php
                    if (isset($_SESSION['interest_rate'])) {
                        echo '<option value="'.$_SESSION['interest_rate'].'">'.$_SESSION['interest_rate'].'</option>';
                    }
                ?>
                <?php foreach ($interest_options as $interest_option): ?>
                    <?php
                        if ($_SESSION['interest_rate'] == $interest_option) {continue;}
                        echo '<option value="'.$interest_option.'">'.$interest_option.'</option>';
                    ?>
                <?php endforeach; ?>
            </select><br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo (isset($_SESSION['years']) ? $_SESSION['years'] : ''); ?>"/><br>

            <label>Compound Interest Monthly:</label>

            <!-- If checked value of 1 will be true -->
            <input type="checkbox" name="compound_interest" value="1" 
            <?php 
                if (isset($_SESSION['using_compound_interest'])) {
                    if ($_SESSION['using_compound_interest'] == 'Yes') {
                        echo 'checked';
                    }
                }
            ?>>
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