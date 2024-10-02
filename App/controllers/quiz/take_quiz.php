<?php
require_once "../App/Models/Quiz.php";
$quizModel = new quizModel();

// Fetch quiz data
$quiz_id = $_POST['quiz_id'];
$question = $quizModel->quizQuestions($quiz_id);
$options = $quizModel->quizOptions($question['question_id']);
$correct_answer = $quizModel->quizCorrect($question['question_id']);

// Pass variables to the view
require "../App/views/tasks/take.quiz.view.php";
?>
