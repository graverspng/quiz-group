<?php

require "../App/views/tasks/create.quiz.view.php";

if (!isset($_SESSION["user"])) {
    header("Location: /login");
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'], $_POST['description'])) {
        require_once "../App/Models/Quiz.php";
        $quizModel = new quizModel();

        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);


        $quizCreated = $quizModel->createQuiz($title, $description);

        if ($quizCreated) {

            $quizId = $quizModel->getLastInsertId();


            foreach ($_POST['questions'] as $questionData) {
                $questionText = htmlspecialchars($questionData['text']);
                $options = $questionData['options'];
                $correctIndex = (int)$questionData['correct'] - 1;

                
                $quizModel->createQuestion($quizId, $questionText);

               
                $questionId = $quizModel->getLastQuestionId();

                
                foreach ($options as $index => $optionText) {
                    $isCorrect = ($index === $correctIndex) ? 1 : 0;
                    $quizModel->createOption($questionId, htmlspecialchars($optionText), $isCorrect);
                }
            }

            
            header("Location: /quizzes");
            exit;
        }
    }
}
?>
