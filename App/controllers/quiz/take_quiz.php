<?php
require "../App/views/tasks/take.quiz.view.php";

$quiz_id = $_POST['quiz_id'];
require_once "../App/Models/Quiz.php";
$quizModel = new quizModel();

// Fetch question data
$question = $quizModel->quizQuestions($quiz_id);
$options = $quizModel->quizOptions($question['question_id']);
$correct_answer = $quizModel->quizCorrect($question['question_id']);

// Start the form
echo '<form action="/submit_quiz" method="post">';

// Display the question
echo '<h2>' . htmlspecialchars($question['text']) . '</h2>';

// Display the options as radio buttons
for ($i = 1; $i <= 4; $i++) {
    if (isset($options['option_text' . $i])) {
        echo '<label>';
        echo '<input type="radio" name="question_' . $question['question_id'] . '" value="' . $i . '"> ';
        echo htmlspecialchars($options['option_text' . $i]);
        echo '</label><br>';
    }
}

// Submit button
echo '<input type="hidden" name="quiz_id" value="' . $quiz_id . '">';
echo '<button type="submit">Submit Quiz</button>';

echo '</form>';
?>
