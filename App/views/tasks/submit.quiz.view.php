<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Submission</title>
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
            max-width: 500px;
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
        <?php if (!empty($message)): ?>
            <div class="alert">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <!-- Button to navigate back to the main route -->
        <a href="/" class="button">Go to Main Page</a>
    </div>
</div>

</body>
</html>
