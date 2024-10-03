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
  background: linear-gradient(135deg, #301934, black, purple); /* Adjusted colors and direction */
  background-size: 300% 100%; /* Adjust the size for smoother movement */
  animation: backgroundMove 10s ease infinite; /* Animation to move background */
  margin: 0;
  font-family: Arial, sans-serif;
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
        <div class="progress-text"><?php echo count($quizData); ?> questions</div>

        <form action="/submit_quiz" method="post">
            <!-- Loop through each question and display its options -->
            <?php foreach ($quizData as $index => $data): ?>
                <div class="question-block">
                    <!-- Display question text -->
                    <h3><?php echo htmlspecialchars($data['question']['text']); ?></h3>

                    <!-- Display options for the current question -->
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <?php if (isset($data['options']['option_text' . $i])): ?>
                            <div class="option">
                                <input type="radio" name="question_<?php echo $data['question']['question_id']; ?>" value="<?php echo $i; ?>" required>
                                <label><?php echo htmlspecialchars($data['options']['option_text' . $i]); ?></label>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            <?php endforeach; ?>
            
            <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
            <button type="submit" class="submit-btn">Submit Quiz</button>
        </form>
        
        <form action="/">
            <button class="submit-btn">Home</button>
        </form>
    </div>
</div>


<?php require "../App/views/components/footer.php"; ?>
