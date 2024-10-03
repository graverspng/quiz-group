<?php

isAdmin();

require "../App/views/tasks/create.quiz.view.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'], $_POST['description'])) {
    require_once "../App/Models/Quiz.php";
    $quizModel = new quizModel();

    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);

    // Create the quiz
    $quizCreated = $quizModel->createQuiz($title, $description);

    if ($quizCreated) {
        $quizId = $quizModel->getLastInsertId($title, $description);

        // Check if questions are set in the form data
        if (isset($_POST['questions']) && isset($_POST['options'])) {
            $questions = $_POST['questions'];  // All questions
            $optionsData = $_POST['options'];  // All options

            // Loop through each question
            foreach ($questions as $questionIndex => $questionData) {
                $questionText = htmlspecialchars($questionData['text']);  // Current question text

                // Insert the question into the database
                $questionCreated = $quizModel->createQuestion($questionText, $quizId);

                if ($questionCreated) {
                    // Get the ID of the inserted question
                    $questionId = $quizModel->getLastQuestionId($quizId, $questionText);

                    // Ensure we have the corresponding options for this question
                    if (isset($optionsData[$questionIndex])) {
                        $options = $optionsData[$questionIndex]['options'];   // Current question's options
                        $correctOptionIndex = $optionsData[$questionIndex]['correct'] - 1;  // Adjust for zero-based index

                        // Ensure there are exactly 4 options as expected
                        if (count($options) === 4) {
                            // Insert the options for the current question
                            $quizModel->createOption($correctOptionIndex, $options[0], $options[1], $options[2], $options[3], $questionId);
                        }
                    }
                }
            }
        }

        // Redirect or display success message
        header("Location: /");
        exit;
    }
}
