<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../App/Models/Quiz.php";
    $quizModel = new quizModel();

    $quiz_id = $_POST['quiz_id'];
    $questions = $quizModel->getAllQuizQuestions($quiz_id);  // Fetch all quiz questions

    $correctAnswersCount = 0;  // To track the number of correct answers
    $totalQuestions = count($questions);  // Total number of questions
    $results = [];  // To store individual question results

    // Loop through each question and check the user's answers
    foreach ($questions as $question) {
        $question_id = $question['question_id'];
        $correct_answer = $quizModel->quizCorrect($question_id)['is_correct'] + 1;

        // Check if the user has answered this question
        if (isset($_POST['question_' . $question_id])) {
            $user_answer = $_POST['question_' . $question_id];

            if ($user_answer == $correct_answer) {
                $results[] = [
                    'question' => $question['text'],
                    'user_answer' => $user_answer,
                    'correct_answer' => $correct_answer,
                    'is_correct' => true,
                ];
                $correctAnswersCount++;  // Increment if the answer is correct
            } else {
                $results[] = [
                    'question' => $question['text'],
                    'user_answer' => $user_answer,
                    'correct_answer' => $correct_answer,
                    'is_correct' => false,
                ];
            }
        } else {
            // No answer selected
            $results[] = [
                'question' => $question['text'],
                'user_answer' => null,
                'correct_answer' => $correct_answer,
                'is_correct' => false,
            ];
        }
    }

    // Pass data to the view
    $score = "{$correctAnswersCount}/{$totalQuestions}";
    require "../App/views/tasks/submit.quiz.view.php";
}
?>
