<?php

$error_message = NULL;
if (!isset($years)) { $years = '4'; }
$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'future_value_form';
    }
}

switch ($action) {
	case 'display_results':
	    $investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
    	$interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
    	$years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);
    	$compound_interest = filter_input(INPUT_POST, 'compound_interest', FILTER_VALIDATE_INT);

    	$error_message = validate_fields($investment, $interest_rate, $years);

    	// If $error_message is empty we had no errors.
    	if ($error_message == '') {
		    
		    $future_value = NULL;

		    // Check whether compound interest was set.
		    if (isset($compound_interest)) {
		    	$compound_interest = 'Yes';

		    	$future_value = $investment * pow((1 + (($interest_rate * .01)/12)), 12 * $years);
		    }
		    else {
		    	$compound_interest = 'No';

			    // calculate the future value
			    $future_value = $investment;
			    for ($i = 1; $i <= $years; $i++) {
			        $future_value = ($future_value + ($future_value * $interest_rate *.01));
			    }
		    }

		    // apply currency and percent formatting
		    $investment_f = '$'.number_format($investment, 2);
		    $yearly_rate_f = $interest_rate.'%';
		    $future_value_f = '$'.number_format($future_value, 2);

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

function validate_fields($investment, $interest_rate, $years) {
	$error_message = NULL;

    if ($investment === FALSE || empty($investment) ) {
        $error_message = 'Investment must be a valid number.'; 
    } else if ( $investment <= 0 ) {
        $error_message = 'Investment must be greater than zero.'; 
    // validate interest rate
    } else if ( $interest_rate === FALSE || empty($interest_rate) )  {
        $error_message = 'Interest rate must be a valid number.'; 
    } else if ( $interest_rate <= 0 ) {
        $error_message = 'Interest rate must be greater than zero.'; 
    // validate years
    } else if ( $years === FALSE || empty($years) ) {
        $error_message = 'Years must be a valid whole number.';
    } else if ( $years <= 0 ) {
        $error_message = 'Years must be greater than zero.';
    } else if ( $years > 30 ) {
        $error_message = 'Years must be less than 31.';
    // set error message to empty string if no invalid entries
    } else {
        $error_message = ''; 
    }

    return $error_message;
}

function option_builder($start, $stop, $by) {
	$options = '';
	for ($i = $start; $i <= $stop; $i += $by) {
		$options .= '<option value="'.$i.'">'.$i.'</option>';
    }

    return $options;
}
?>