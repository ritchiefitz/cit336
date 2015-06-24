<?php

function calculate_future_value($investment, $interest_rate, $years, $compound_interest = FALSE) {
    $future_value = NULL;

    // Check whether compound interest was set.
    if ($compound_interest) {
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

    return $future_value;
}

function currency_format($value, $decimal = 2) {
    return '$' . number_format($value, $decimal);
}

function percentage_format($value) {
    return $value . '%';
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