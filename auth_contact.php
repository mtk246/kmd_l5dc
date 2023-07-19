<?php
require_once("./ErrorHandler/error.php");
require_once("./Controller/ContactForm.php");
require_once("./Controller/constants.php");

$name = $_POST['name'];
$email = $_POST['email'];

$contactForm = new ContactForm();
$contactFormData = $contactForm->createContactForm($name, $email);

if ($contactFormData['success'] === true) {
    $redirectUrl = CONST_BASE_URL . '/contact.php?success';
    header("Location: $redirectUrl");
    exit();
}
?>