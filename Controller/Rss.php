<?php
require_once("Query.php");
require_once(__DIR__ . "/constants.php");
require_once("UUID.php");

class RSS{
    private array $rss;
    private string $id;
    private query $query;
    private string $title;
    private string $description;
    private array $response;

    function __construct() {
        $this->query = new Query();
    }

    function getRssData() {
        $sql = "SELECT * FROM rss_feed";
        $this->rss = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->rss);
    }

    function getCurrentRssData($id) {
        $this->id = $id;

        $sql = "SELECT * FROM rss_feed WHERE id = '$this->id'";
        $this->rss = $this->query->executeQuery($sql, CONST_GET);

        return json_encode($this->rss);
    }

    function createRssData($title, $description) {
        $uuid_value= new UUID();
        $this->id = $uuid_value->generate();
        $this->title = $title;
        $this->description = $description;

        $rssQuery = "INSERT INTO rss_feed (id, title, description) VALUES ('$this->id', '$this->title', '$this->description')";
        $this->response = $this->query->executeQuery($rssQuery, CONST_POST);

        return $this->response;
    }

    function updateRssData($id, $title, $description) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;

        $sql = "UPDATE rss_feed SET title = '$this->title', description = '$this->description' WHERE id = '$this->id'";

        $this->response = $this->query->executeQuery($sql, CONST_PUT);

        return $this->response;
    }
}
?>