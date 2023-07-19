<?php
require_once("Query.php");
require_once(__DIR__ . "/constants.php");

class ContactForm{
    private array $contact;
    private string $name;
    private query $query;
    private string $email;
    private array $response;

    function __construct() {
        $this->query = new Query();
    }

    function createContactForm($name, $email) {
        $this->name = $name;
        $this->email = $email;

        $contactQuery = "INSERT INTO contact_form (name, email) VALUES ('$this->name', '$this->email')";
        $this->response = $this->query->executeQuery($contactQuery, CONST_POST);

        return $this->response;
    }
}
?>