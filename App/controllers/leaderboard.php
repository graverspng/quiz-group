<?php 
require "../App/Core/Database.php"; 

class Leaderboard {
    private $db;

    public function __construct() {
        
        $this->db = new Database([
            'host' => 'localhost',
            'dbname' => 'quiz_group',  
            'user' => 'root',          
            'password' => 'root'       
        ]);
    }

    public function getGlobalLeaderboard() {
        
        $query = "SELECT u.username, SUM(qr.score) AS total_score 
                  FROM users u
                  JOIN quiz_results qr ON u.user_id = qr.user_id   
                  GROUP BY u.username 
                  ORDER BY total_score DESC 
                  LIMIT 15";
        

        $stmt = $this->db->prepare($query);
        
        if ($stmt->execute()) {
        
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            
            return [];
        }
    }
}
require "../App/views/tasks/leaderboard.view.php";
