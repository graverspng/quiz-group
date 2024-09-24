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
        
        // Assuming the Database class uses prepare and execute
        $stmt = $this->db->prepare($query);
        
        if ($stmt->execute()) {
            // Fetch the result as an associative array
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Handle query failure (optional)
            return [];
        }
    }
}
require "../App/views/tasks/leaderboard.view.php";
