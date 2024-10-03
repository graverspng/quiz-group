<?php

require "../App/Database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"]; 
    $score = $_SESSION["score"]; 

    // Connect to the database
    $db = new Database([
        'host' => 'localhost',
        'dbname' => 'quiz_group',
        'user' => 'root',
        'password' => 'root'
    ]);

    
    $query = "INSERT INTO quiz_results (user_id, score, completed_at) VALUES (:user_id, :score, NOW())";
    $stmt = $db->prepare($query);
    $stmt->execute([
        'user_id' => $user_id,
        'score' => $score 
    ]);

  
    unset($_SESSION['score']); 
    header("Location: /leaderboard");
    exit();
}
?>
