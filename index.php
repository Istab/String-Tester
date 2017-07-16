<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        /*************************************************
         * validate and process the name
         ************************************************/
        // 1. make sure the user enters a name
	if(empty($name)) {
	  $message = "Please provide a name.";
	  break;
	}
        // 2. display the name with only the first letter capitalized
	$name = strtolower($name);
	$name = ucwords($name);
	$space_index = strpos($name, ' ');
	if ($space_index === false) {
	  $first_name = $name;
	} else {
	  // Get everything in name before the space
	  $first_name = substr($name, 0, $space_index); 
	}

	// 3. Add the name to the message
	$message = "Hello $first_name,\n\n";
	$message .= "Thank you for entering this data:\n\n";
	$message .= "Name: $name\n";

        /*************************************************
         * validate and process the email address
         ************************************************/
        // 1. make sure the user enters an email
        // 2. make sure the email address has at least one @ sign and one dot character

        /*************************************************
         * validate and process the phone number
         ************************************************/
        // 1. make sure the user enters at least seven digits, not including formatting characters
        // 2. format the phone number like this 123-4567 or this 123-456-7890

        break;
}
include 'string_tester.php';
?>
