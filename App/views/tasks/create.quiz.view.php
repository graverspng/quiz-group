<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <?php require "../App/views/components/head.php"; ?>
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
        }

        .create-quiz-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh; /* Reduced height */
            background-color: #121212;
        }

        .create-quiz-content {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
            max-width: 600px;
            width: 100%;
            text-align: left;
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
            width: 60%; /* Adjust input width to make it smaller */
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #333;
            background-color: #333;
            color: #e0e0e0;
        }

        .create-quiz-content input[type="text"]::placeholder,
        .create-quiz-content input[type="number"]::placeholder {
            color: #bbb;
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
            width: 45%; /* Smaller button width */
        }

        .create-quiz-content button:hover {
            background-color: #9a67ea;
        }

        .create-quiz-content a {
            color: #bb86fc;
            text-decoration: none;
            width: 45%; /* Align home button width with submit */
            text-align: center;
            padding: 10px 20px;
            background-color: #1e1e1e;
            border: 1px solid #bb86fc;
            border-radius: 5px;
        }

        .create-quiz-content a:hover {
            text-decoration: underline;
            background-color: #333;
        }
    </style>
</head>
<body>
    <br>
    <br>
    <div class="create-quiz-container">
        <div class="create-quiz-content">
            <h1>Create Quiz</h1>

            <form action="/create" method="POST">
                <p>Theme: <input type="text" name="title" placeholder="Enter quiz Theme" required></p>
                <p>Description: <input type="text" name="description" placeholder="Enter quiz Description" required></p>

                <br>

                <?php for ($i = 1; $i <= 1; $i++): ?>
                    <div class="Question-<?php echo $i; ?>">
                        <p>Correct Option Index: <input type="number" name="options[<?php echo $i; ?>][correct]" min="1" max="4" placeholder="1-4" required></p>
                        <p>Question <?php echo $i; ?>: <input type="text" name="questions[<?php echo $i; ?>][text]" placeholder="Enter question" required></p>
                        <p>Option 1: <input type="text" name="options[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                        <p>Option 2: <input type="text" name="options[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                        <p>Option 3: <input type="text" name="options[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                        <p>Option 4: <input type="text" name="options[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                    </div>
                <?php endfor; ?>

                <div class="button-container">
                    <button type="submit">Create Quiz</button>
                    <a href="/">Home</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
