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

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['questions'])) {
                $question = $_POST['questions'];
                $a = implode(" ", $question);
                $quizModel->createQuestion($a, $quizId);
                

                }
               
                $questionId = $quizId;

                /*
                foreach ($options as $index => $optionText) {
                    $isCorrect = ($index === $correctIndex) ? 1 : 0;
                    $quizModel->createOption($questionId, htmlspecialchars($optionText), $isCorrect);
                }
                */
            }

            
            header("Location: /");
            exit;
        }

?>
