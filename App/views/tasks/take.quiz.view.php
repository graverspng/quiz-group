<?php require "../App/views/components/head.php"; ?>

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

    .progress-container {
        width: 100%;
        background-color: #333;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .progress-bar {
        width: 100%; /* Set to 100% for full progress */
        height: 10px;
        background-color: #bb86fc;
        border-radius: 5px;
    }

    .progress-text {
        margin-bottom: 15px;
        font-size: 14px;
        color: #e0e0e0;
    }

    .question-block {
        margin-bottom: 20px;
    }

    .question-block h3 {
        margin-bottom: 10px;
        font-size: 18px;
        color: #e0e0e0;
    }

    .option {
        margin-bottom: 10px;
        text-align: left;
    }

    .option input[type="radio"] {
        margin-right: 10px;
    }

    .option label {
        font-size: 16px;
        color: #e0e0e0;
    }

    .submit-btn {
        padding: 10px 20px;
        background-color: #bb86fc;
        color: #121212;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    .submit-btn:hover {
        background-color: #9a67ea;
    }
</style>

<div class="quiz-container">
    <div class="quiz-content">
        <h1>Sample Quiz</h1>

        <div class="progress-container">
            <div class="progress-bar"></div> <!-- Progress bar is now full -->
        </div>
        <div class="progress-text">1 out of 1 questions</div>

        <div class="question-block">
            <h3><?php echo htmlspecialchars($question['text']); ?></h3>
            <form action="/submit_quiz" method="post">
                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <?php if (isset($options['option_text' . $i])): ?>
                        <div class="option">
                            <input type="radio" name="question_<?php echo $question['question_id']; ?>" value="<?php echo $i; ?>" required>
                            <label><?php echo htmlspecialchars($options['option_text' . $i]); ?></label>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
                
                <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
                <button type="submit" class="submit-btn">Submit Quiz</button>
            </form>
        </div>
        <form action="/">
            <button class="submit-btn">Home</button>
        </form>
    </div>
</div>

<?php require "../App/views/components/footer.php"; ?>
