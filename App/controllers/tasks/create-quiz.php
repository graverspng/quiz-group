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
                $string = $question[1]['text'];
                $quizModel->createQuestion($string, $quizId);
                

                }
               
                $questionId = $quizId;

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['options'] )) {
                    $options = ($_POST['options']);
                    $correct = $options[1]['correct'];
                    $correct = $correct -1;
                    
                    $option1 = $options[1]['options'][0];
                    $option2 = $options[1]['options'][1];
                    $option3 = $options[1]['options'][2];
                    $option4 = $options[1]['options'][3];

                    echo $option1,"  ", $option2,"  ", $option3,"  ", $option4;

                    $quizModel->createOption($correct, $option1, $option2, $option3, $option4, $questionId);
                }
    
                
            

            
            //header("Location: /");
            exit;
        }
    }
?>
