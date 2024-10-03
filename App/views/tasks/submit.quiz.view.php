<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
        }

        .quiz-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #121212;
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

        .alert {
            padding: 15px;
            background-color: #333;
            color: #e0e0e0;
            border: 1px solid #444;
            border-radius: 5px;
            margin-bottom: 20px;
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
    </style>
</head>
<body>

<div class="quiz-container">
    <div class="quiz-content">
        <h1>Quiz Results</h1>

        <!-- Display the overall score -->
        <div class="score">
            Your Score: <?php echo htmlspecialchars($score); ?>
        </div>

        <!-- Loop through the results and show each question's outcome -->
        <?php foreach ($results as $result): ?>
            <div class="result-item">
                <h3><?php echo htmlspecialchars($result['question']); ?></h3>
                <p>Your answer: 
                    <?php if ($result['user_answer'] !== null): ?>
                        <span><?php echo htmlspecialchars($result['user_answer']); ?></span>
                    <?php else: ?>
                        <span>No answer selected</span>
                    <?php endif; ?>
                </p>
                <p>Correct answer: <span><?php echo htmlspecialchars($result['correct_answer']); ?></span></p>
                <p class="<?php echo $result['is_correct'] ? 'correct' : 'incorrect'; ?>">
                    <?php echo $result['is_correct'] ? 'Correct!' : 'Incorrect!'; ?>
                </p>
            </div>
        <?php endforeach; ?>

        <!-- Button to navigate back to the main route -->
        <a href="/" class="button">Go to Main Page</a>
    </div>
</div>

</body>
</html>
