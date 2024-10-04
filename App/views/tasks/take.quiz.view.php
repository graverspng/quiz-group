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
  background: linear-gradient(135deg, #301934, black, purple);
  background-size: 300% 100%;
  animation: backgroundMove 10s ease infinite;
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
    position: relative;
}

.progress-bar {
    width: 0%; /* Initially 0% */
    height: 10px;
    background-color: #bb86fc;
    border-radius: 5px;
    transition: width 0.3s ease; /* Smooth transition */
}

.progress-text {
    margin-bottom: 15px;
    font-size: 14px;
    color: #e0e0e0;
    position: absolute;
    top: -20px; /* Position above the progress bar */
    left: 50%;
    transform: translateX(-50%);
}

.question-block {
    display: none;
    margin-bottom: 20px;
}

.question-block.active {
    display: block;
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
            <div class="progress-bar" id="progress-bar"></div>
            <div class="progress-text" id="progress-text">0%</div>
        </div>
        
        <form id="quiz-form" action="/submit_quiz" method="post">
            <?php foreach ($quizData as $index => $data): ?>
                <div class="question-block" id="question_<?php echo $index; ?>">
                    <h3><?php echo htmlspecialchars($data['question']['text']); ?></h3>

                    <?php
                    // Extract and shuffle options for the current question
                    $options = [];
                    for ($i = 1; $i <= 4; $i++) {
                        if (isset($data['options']['option_text' . $i])) {
                            $options[] = [
                                'text' => $data['options']['option_text' . $i],
                                'value' => $i
                            ];
                        }
                    }
                    shuffle($options);
                    ?>

                    <?php foreach ($options as $option): ?>
                        <div class="option">
                            <input type="radio" name="question_<?php echo $data['question']['question_id']; ?>" value="<?php echo $option['value']; ?>" required>
                            <label><?php echo htmlspecialchars($option['text']); ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
            <button type="button" class="submit-btn" id="next-question-btn">Next Question</button>
        </form>

        <form action="/">
            <button class="submit-btn">Home</button>
        </form>
    </div>
</div>

<script>
    let currentQuestionIndex = 0;
    const totalQuestions = <?php echo count($quizData); ?>;
    const progressBar = document.getElementById('progress-bar');
    const progressText = document.getElementById('progress-text');

    // Show the first question
    document.getElementById('question_0').classList.add('active');

    document.getElementById('next-question-btn').addEventListener('click', function() {
        const currentQuestion = document.getElementById('question_' + currentQuestionIndex);
        const selectedOption = currentQuestion.querySelector('input[type="radio"]:checked');

        if (!selectedOption) {
            alert('Please select an option to proceed.');
            return;
        }

        // Hide current question
        currentQuestion.classList.remove('active');
        currentQuestionIndex++;

        // Update progress bar and percentage
        const progressPercentage = Math.floor((currentQuestionIndex / totalQuestions) * 100);
        progressBar.style.width = progressPercentage + '%';
        progressText.textContent = progressPercentage + '%';

        // If there are more questions, show the next question
        if (currentQuestionIndex < totalQuestions) {
            document.getElementById('question_' + currentQuestionIndex).classList.add('active');
        } else {
            // If all questions are answered, submit the form
            document.getElementById('quiz-form').submit();
        }
    });
</script>

<?php require "../App/views/components/footer.php"; ?>
