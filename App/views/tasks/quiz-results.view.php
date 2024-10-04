<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <style>
        /* Include the provided CSS styles here */
    </style>
</head>
<body>
    <div class="results-container">
        <h1>Quiz Results</h1>
        <!-- Use PHP to display the score dynamically -->
        <p>Your Score: <?php echo $score; ?> out of <?php echo $totalQuestions; ?></p>

        <!-- Button to show answers -->
        <button id="toggle-answers-btn">Show Answers</button>

        <!-- Hidden answers section -->
        <div class="answers-container" id="answers-container">
            <?php foreach ($results as $result): ?>
                <p>
                    Question: <?php echo htmlspecialchars($result['question']); ?><br>
                    Your answer: <?php echo htmlspecialchars($result['user_answer']); ?><br>
                    Correct answer: <?php echo htmlspecialchars($result['correct_answer']); ?><br>
                    <span class="<?php echo $result['is_correct'] ? 'correct' : 'incorrect'; ?>">
                        <?php echo $result['is_correct'] ? 'Correct!' : 'Incorrect!'; ?>
                    </span>
                </p>
            <?php endforeach; ?>
        </div>

        <br>
        <button onclick="window.location.href='/';">Go to Main Page</button>
    </div>

    <script>
        // JavaScript to toggle answers visibility
        document.getElementById('toggle-answers-btn').addEventListener('click', function() {
            var answersContainer = document.getElementById('answers-container');
            if (answersContainer.style.display === 'none' || answersContainer.style.display === '') {
                answersContainer.style.display = 'block';
                this.textContent = 'Hide Answers';
            } else {
                answersContainer.style.display = 'none';
                this.textContent = 'Show Answers';
            }
        });
    </script>
</body>
</html>
