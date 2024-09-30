<?php
require "../App/views/tasks/take.quiz.view.php";


    echo $quiz_id = $_POST['quiz_id'];
    require_once "../App/Models/Quiz.php";
    $quizModel = new quizModel();
    

    