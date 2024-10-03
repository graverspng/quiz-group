<?php
ob_start(); // Start output buffering


isAdmin();

require "../App/views/tasks/create.quiz.view.php";
require_once "../App/Models/Quiz.php";
$quizModel = new quizModel();

// Handle the quiz creation process
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'], $_POST['description'], $_POST['question_text'], $_POST['options'], $_POST['correct'])) {
    if (!isset($_SESSION['quiz_id'])) {
        // Create a new quiz with title and description
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $quizModel->createQuiz($title, $description);
        $_SESSION['quiz_id'] = $quizModel->getLastInsertId($title, $description);
    }

    $quizId = $_SESSION['quiz_id'];
    $questionText = htmlspecialchars($_POST['question_text']);
    $options = array_map('htmlspecialchars', $_POST['options']);
    $correctOptionIndex = $_POST['correct'] - 1;

    // Add the question to the quiz
    $quizModel->createQuestion($questionText, $quizId);
    $questionId = $quizModel->getLastQuestionId($quizId, $questionText);

    // Insert the options
    if (count($options) === 4) {
        $quizModel->createOption($correctOptionIndex, $options[0], $options[1], $options[2], $options[3], $questionId);
    }

    // Redirect to create another question
    header("Location: /create");
    exit;
}

// When done, unset session or redirect to another page
if (isset($_GET['finish'])) {
    unset($_SESSION['quiz_id']);
    header("Location: /");
    exit;
}

// End output buffering and flush output
ob_end_flush();
?>
