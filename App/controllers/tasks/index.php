<?php

// Check if the user is authenticated
auth();

// Set the page title
$title = "Home Page";

// Include the Quiz model
require_once "../App/Models/Quiz.php";

// Innstantiate the quiz model and fetch all quizzes from the database
$quizModel = new quizModel();
$quizzes = $quizModel->getAllQuizzes();

// Pass the quizzes to the view
require "../App/views/tasks/index.view.php";
?>
