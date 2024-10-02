<?php
session_start();
require "../App/Database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"]; // Ensure user is logged in
    $score = $_SESSION["score"]; // Fetch score from session

    // Connect to the database
    $db = new Database([
        'host' => 'localhost',
        'dbname' => 'quiz_group',
        'user' => 'root',
        'password' => 'root'
    ]);

    // Insert the quiz score into the database
    $query = "INSERT INTO quiz_results (user_id, score, completed_at) VALUES (:user_id, :score, NOW())";
    $stmt = $db->prepare($query);
    $stmt->execute([
        'user_id' => $user_id,
        'score' => $score // Ensure score is saved correctly
    ]);

    // Reset the score in the session after saving
    unset($_SESSION['score']); // Clear score session after saving
    header("Location: /leaderboard");
    exit();
}
?>
