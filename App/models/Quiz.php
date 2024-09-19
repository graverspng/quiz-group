<?php

require_once "../app/Core/Database.php";

class quizModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createQuiz( string $Title, string $description,)
    {
        $Title = htmlspecialchars($Title);
        $description = htmlspecialchars($description);

    
        $query = $this->db->dbconn->prepare("INSERT INTO quizzes ( Title, description) VALUES (:Title, :description)");
        var_dump($query);
        $query->execute([
            ':Title' => $Title,
            ':description' => $description,
        ]);
        var_dump($query);
    }}