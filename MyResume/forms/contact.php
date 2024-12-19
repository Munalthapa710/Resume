<?php
/**
* Requires the "PHP Email Form" library
* The "PHP Email Form" library is available only in the pro version of the template
* The library should be uploaded to: vendor/php-email-form/php-email-form.php
* For more info and help: https://bootstrapmade.com/php-email-form/
*/

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'thapamunal710@.com'; // Corrected email format

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;

// Validate and sanitize input
$contact->from_name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$contact->from_email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
$contact->subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

$contact->smtp = array(
    'host' => 'thapamunal.com.np',
    'username' => 'Munal Thapa',
    'password' => 'qxsh idbc hkva geqg',
    'port' => '80'
);


$contact->add_message($contact->from_name, 'From');
$contact->add_message($contact->from_email, 'Email');
$contact->add_message(isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '', 'Message', 20);

echo $contact->send();
?>