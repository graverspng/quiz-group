<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <?php require "../App/views/components/head.php"; ?>
    <style>
       body {
    background: linear-gradient(135deg, #301934, black, purple);
    background-size: 300% 100%;
    margin: 0;
    font-family: Arial, sans-serif;
}

.create-quiz-container {
    margin-top: 100px;
    margin-bottom: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
}

.create-quiz-content {
    background-color: #1e1e1e;
    padding: 20px;
    color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
    max-width: 600px;
    width: 100%;
}

.create-quiz-content h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #bb86fc;
    text-align: center;
}

.create-quiz-content form p {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.create-quiz-content input[type="text"], 
.create-quiz-content input[type="number"] {
    width: 60%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #333;
    background-color: #333;
    color: #e0e0e0;
}

.button-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.create-quiz-content button {
    padding: 10px 20px;
    background-color: #bb86fc;
    color: #121212;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 45%;
}

.create-quiz-content button:hover {
    background-color: #9a67ea;
}

.create-quiz-content a {
    color: #bb86fc;
    text-decoration: none;
    width: 45%;
    text-align: center;
    padding: 10px 20px;
    background-color: #1e1e1e;
    border: 1px solid #bb86fc;
    border-radius: 5px;
}

.create-quiz-content a:hover {
    background-color: #333;
}

    </style>
</head>
<body>
    <div class="create-quiz-container">
        <div class="create-quiz-content">
            <h1>Create Quiz</h1>
            <form id="quiz-form" action="/create" method="POST">
                <?php if (!isset($_SESSION['quiz_id'])): ?>
                    <!-- Only show title and description for the first question -->
                    <p id="title-container">Quiz Title: <input type="text" name="title" placeholder="Enter quiz title" required></p>
                    <p id="description-container">Description: <input type="text" name="description" placeholder="Enter quiz description" required></p>
                <?php endif; ?>

                <p>Correct Option Index: <input type="number" name="correct" min="1" max="4" placeholder="1-4" required></p>
                <p>Question: <input type="text" name="question_text" placeholder="Enter question" required></p>
                <p>Option 1: <input type="text" name="options[]" placeholder="Enter option" required></p>
                <p>Option 2: <input type="text" name="options[]" placeholder="Enter option" required></p>
                <p>Option 3: <input type="text" name="options[]" placeholder="Enter option" required></p>
                <p>Option 4: <input type="text" name="options[]" placeholder="Enter option" required></p>

                <div class="button-container">
                    <button type="submit" id="next-question-btn">Next Question</button>
                    <a href="/create?finish=1">Finish</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
