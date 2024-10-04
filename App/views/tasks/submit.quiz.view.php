<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
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
            background: linear-gradient(135deg, #301934, black, purple);
            background-size: 300% 100%;
            animation: backgroundMove 10s ease infinite;
            margin: 0;
            font-family: Arial, sans-serif;
            color: #e0e0e0;
        }

        .quiz-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .quiz-content {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .quiz-content h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #bb86fc;
        }

        .result-item {
            margin-bottom: 15px;
            text-align: left;
        }

        .result-item h3 {
            margin-bottom: 5px;
            font-size: 18px;
        }

        .result-item p {
            margin: 0;
            font-size: 16px;
        }

        .correct {
            color: #4caf50;
        }

        .incorrect {
            color: #f44336;
        }

        .score {
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
            color: #bb86fc;
        }

        .button {
            padding: 10px 20px;
            background-color: #bb86fc;
            color: #121212;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #9a67ea;
        }

        .nav-button {
            padding: 10px;
            background-color: #bb86fc;
            color: #121212;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .nav-button:hover {
            background-color: #9a67ea;
        }

        .nav-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="quiz-container">
    <div class="quiz-content">
        <h1>Quiz Results</h1>

        <!-- Display the overall score -->
        <div class="score">
            Your Score: <?php echo $score; ?> out of <?php echo $totalQuestions; ?>
        </div>

        <!-- Display one question at a time -->
        <div id="result-display" class="result-item">
            <h3 id="question-text"></h3>
            <p>Your answer: <span id="user-answer"></span></p>
            <p>Correct answer: <span id="correct-answer"></span></p>
            <p id="result-message"></p>
        </div>

        <!-- Question number display -->
        <div id="question-number" style="margin: 10px 0;"></div>

        <!-- Navigation buttons -->
        <div class="nav-buttons">
            <button id="prev-btn" class="nav-button" disabled>Previous</button>
            <button id="next-btn" class="nav-button" disabled>Next</button>
        </div>

        <!-- Button to navigate back to the main route -->
        <a href="/" class="button">Go to Main Page</a>
    </div>
</div>

<script>
    const results = <?php echo json_encode($results); ?>; // Pass PHP results to JavaScript
    let currentIndex = 0; // Track the current question index

    // Function to display the current question
    function displayQuestion(index) {
        const resultDisplay = document.getElementById('result-display');
        const questionText = document.getElementById('question-text');
        const userAnswer = document.getElementById('user-answer');
        const correctAnswer = document.getElementById('correct-answer');
        const resultMessage = document.getElementById('result-message');
        const questionNumber = document.getElementById('question-number');

        const result = results[index];
        questionText.textContent = result.question;
        userAnswer.textContent = result.user_answer !== null ? result.user_answer : "No answer selected";
        correctAnswer.textContent = result.correct_answer;
        resultMessage.textContent = result.is_correct ? "Correct!" : "Incorrect!";
        resultMessage.className = result.is_correct ? "correct" : "incorrect";

        questionNumber.textContent = `Question ${index + 1} of ${results.length}`; // Display current question number
        document.getElementById('prev-btn').disabled = (index === 0); // Disable if on the first question
        document.getElementById('next-btn').disabled = (index === results.length - 1); // Disable if on the last question
    }

    // Show the first question when the page loads
    displayQuestion(currentIndex);

    // Navigation button event listeners
    document.getElementById('prev-btn').addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
            displayQuestion(currentIndex);
        }
    });

    document.getElementById('next-btn').addEventListener('click', function() {
        if (currentIndex < results.length - 1) {
            currentIndex++;
            displayQuestion(currentIndex);
        }
    });
</script>

</body>
</html>
