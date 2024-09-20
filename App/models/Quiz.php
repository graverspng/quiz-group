<?php

require_once "../app/Core/Database.php";

class quizModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createQuiz(string $Title, string $description) {
        $Title = htmlspecialchars($Title);
        $description = htmlspecialchars($description);

        $query = $this->db->dbconn->prepare("INSERT INTO quizzes (Title, description) VALUES (:Title, :description)");
        $query->execute([
            ':Title' => $Title,
            ':description' => $description,
        ]);

        return $query->rowCount() > 0;
    }

    public function getAllQuizzes() {
        $query = $this->db->dbconn->prepare("SELECT * FROM quizzes");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
