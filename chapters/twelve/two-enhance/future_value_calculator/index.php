<?php

// expire two weeks from now.
$expiration = 60 * 60 * 24 * 14;
session_set_cookie_params($expiration, '/');
session_start();

$error_message = NULL;

$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'future_value_form';
    }
}

include 'functions.php';

switch ($action) {
	case 'display_results':
	    $investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
    	$interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
    	$years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);
    	$compound_interest = filter_input(INPUT_POST, 'compound_interest', FILTER_VALIDATE_INT);

    	$error_message = validate_fields($investment, $interest_rate, $years);

    	// If $error_message is empty we had no errors.
    	if ($error_message == '') {
            $_SESSION['investment'] = $investment;
            $_SESSION['interest_rate'] = $interest_rate;
            $_SESSION['years'] = $years;
		    
            $future_value = calculate_future_value($investment, $interest_rate, $years, $compound_interest);
            $_SESSION['using_compound_interest'] = (isset($compound_interest)) ? 'Yes' : 'No';

		    // apply currency and percent formatting
		    $_SESSION['investment_f'] = currency_format($investment);
		    $_SESSION['yearly_rate_f'] = percentage_format($interest_rate);
		    $_SESSION['future_value_f'] = currency_format($future_value);

    		include('display_results.php');
    	}
    	else {
			$investment_options = option_builder(10000, 50000, 5000);
			$interest_options = option_builder(4, 12, 0.5);

    		include('future_value_form.php');
    	}

		break;
	// Default is to display future value calculator. 
	default:
		$investment_options = option_builder(10000, 50000, 5000);
		$interest_options = option_builder(4, 12, 0.5);

		include('future_value_form.php');
		break;
}
?>