<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../App/Models/Quiz.php";
    $quizModel = new quizModel();

    $quiz_id = $_POST['quiz_id'];
    $question = $quizModel->quizQuestions($quiz_id);
    $correct_answer = $quizModel->quizCorrect($question['question_id']);

    $message = '';

 
    if (isset($_POST['question_' . $question['question_id']])) {
        $user_answer = $_POST['question_' . $question['question_id']];

        // Check if the answer is correct
        if ($user_answer == $correct_answer['is_correct'] + 1) {
            $message = "Correct! You got the right answer.";
        } else {
            $message = "Incorrect! The correct answer was option " . ($correct_answer['is_correct'] + 1) . ".";
        }
    } else {
        // Handle the case where no answer was selected
        $message = "Please select an answer before submitting.";
    }

    // Pass the message to the view
    require "../App/views/tasks/submit.quiz.view.php";
} else {
    // If not a POST request, you might want to handle that here.
    $message = ''; // Default message if needed.
    require "../App/views/tasks/submit.quiz.view.php";
}
?>
