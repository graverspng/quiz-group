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
<<<<<<< Updated upstream
            // Fetch the last inserted quiz ID
            $quizId = $quizModel->getLastInsertId();

            foreach ($_POST['questions'] as $questionData) {
                $questionText = htmlspecialchars($questionData['text']);
                $options = $questionData['options'];
                $correctIndex = (int)$questionData['correct'] - 1;

                // Insert the question
                $quizModel->createQuestion($quizId, $questionText);

                // Fetch the last inserted question ID
                $questionId = $quizModel->getLastQuestionId();

                // Insert the options
=======

            $quizId = $quizModel->getLastInsertId($title, $description);

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['questions'])) {
                $question = $_POST['questions'];
                $questionText = implode("", $question);
                $quiz_id = implode("",$quizId);
                $quizModel->createQuestion($quiz_id, $questionText);
                

                }
               
                $questionId = $quizId;

                /*
>>>>>>> Stashed changes
                foreach ($options as $index => $optionText) {
                    $isCorrect = ($index === $correctIndex) ? 1 : 0;
                    $quizModel->createOption($questionId, htmlspecialchars($optionText), $isCorrect);
                }
                */
            }

<<<<<<< Updated upstream
            // Redirect to the quizzes page
            header("Location: /quizzes");
            exit;
        }
    }
=======
            
            header("Location: /");
            exit;
        }
    }

>>>>>>> Stashed changes
?>
