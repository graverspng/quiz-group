<?php

require "../App/views/tasks/create.quiz.view.php";
if(!isset($_SESSION["user"])){
    header("Location: /user/login");
}
else{
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'],$_POST['description'])) {
    
    require_once "../App/Models/Quiz.php";
    $quizModel = new quizModel();

        $title = $_POST['title'];
        $description = $_POST['description'];

        

        $result = $quizModel->createQuiz($userID, $title, $description);

}
}
    
?>