<?php
require_once "../App/Models/Quiz.php";
$quizModel = new quizModel();

// Fetch the quiz data (assumed to come from POST or GET)
$quiz_id = $_POST['quiz_id'] ?? 1;  // Default to 1 for testing if not provided

// Fetch all the questions for the quiz
$questions = $quizModel->getAllQuizQuestions($quiz_id);  // Updated method

// Prepare an array to store questions and their options
$quizData = [];

// Loop through each question and fetch its options
foreach ($questions as $question) {
    $question_id = $question['question_id'];
    
    // Fetch options for the current question
    $options = $quizModel->quizOptions($question_id);
    
    // Store the question and options together
    $quizData[] = [
        'question' => $question,
        'options' => $options,
    ];
}

// Pass variables to the view
require "../App/views/tasks/take.quiz.view.php";
?>
