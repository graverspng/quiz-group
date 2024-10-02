<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../App/Models/Quiz.php";
    $quizModel = new quizModel();

    $quiz_id = $_POST['quiz_id'];
    $question = $quizModel->quizQuestions($quiz_id);
    $correct_answer = $quizModel->quizCorrect($question['question_id']);

    // Check if the user has selected an answer
    if (isset($_POST['question_' . $question['question_id']])) {
        $user_answer = $_POST['question_' . $question['question_id']];

        // Check if the answer is correct
        if ($user_answer == $correct_answer['is_correct'] + 1) {
            echo "Correct! You got the right answer.";
        } else {
            echo "Incorrect! The correct answer was option " . ($correct_answer['is_correct'] + 1) . ".";
        }
    } else {
        // Handle the case where no answer was selected
        echo "Please select an answer before submitting.";
        
    }
}
?>
