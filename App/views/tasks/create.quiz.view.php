<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <?php require "../App/views/components/head.php"; ?>
    <style>
@keyframes backgroundMove {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

body {
    margin: 0;
    background: linear-gradient(270deg, #000000, #808080, #D8BFD8, #808080, #000000); /* Gradient with specified colors */
    background-size: 300% 100%; /* Adjust the size for smoother movement */
    animation: backgroundMove 10s ease infinite; /* Animation to move background */
    color: #e0e0e0;
    font-family: Arial, sans-serif;
}

.create-quiz-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
}

.create-quiz-content {
    background-color: #1e1e1e; /* Keep the dark background for the content area */
    padding: 20px;
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
            <form action="/create" method="POST">
                <p>Quiz Title: <input type="text" name="title" placeholder="Enter quiz title" required></p>
                <p>Description: <input type="text" name="description" placeholder="Enter quiz description" required></p>

                <p>Correct Option Index: <input type="number" name="correct" min="1" max="4" placeholder="1-4" required></p>
                <p>Question: <input type="text" name="question_text" placeholder="Enter question" required></p>
                <p>Option 1: <input type="text" name="options[]" placeholder="Enter option" required></p>
                <p>Option 2: <input type="text" name="options[]" placeholder="Enter option" required></p>
                <p>Option 3: <input type="text" name="options[]" placeholder="Enter option" required></p>
                <p>Option 4: <input type="text" name="options[]" placeholder="Enter option" required></p>

                <div class="button-container">
                    <button type="submit">Next Question</button>
                    <a href="/">Finish</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
