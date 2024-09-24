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
<<<<<<< Updated upstream
=======

    public function getLastInsertId(string $Title, string $description) {
        $query = $this->db->dbconn->prepare("SELECT quiz_id FROM quizzes WHERE title = :Title AND description = :description");
        $query->execute([
            ':Title' => $Title,
            ':description' => $description,
        ]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['quiz_id'] : null;
    }
    public function createQuestion(string $Text, int $quiz_id) {
        $Text = htmlspecialchars($Text);
        $query = $this->db->dbconn->prepare("INSERT INTO questions (Text, quiz_id) VALUES (:Text, :quiz_id)");
        $query->execute([
            ':quiz_id' => $quiz_id,
            ':Text' => $Text,
        ]);
        return $query->rowCount() > 0;
    }
>>>>>>> Stashed changes
}
?>
