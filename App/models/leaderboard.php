<?php
require "../App/Core/Database.php"; // Ensure your Database class is included

class Leaderboard {
    private $db;

    public function __construct() {
        // Connect to the database
        $this->db = new Database([
            'host' => 'localhost',
            'dbname' => 'quiz_group',  // Your database name
            'user' => 'root',          // Your database user
            'password' => 'root'       // Your database password
        ]);
    }

    public function getGlobalLeaderboard() {
        // Fetch the top 15 users by total score across all quizzes
        $query = "SELECT username, SUM(score) AS total_score 
                  FROM users 
                  GROUP BY username 
                  ORDER BY total_score DESC 
                  LIMIT 15";
        $results = $this->db->execute($query, []);
        return $results->fetchAll();
    }
}
?>
