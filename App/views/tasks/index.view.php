<?php require "../App/views/components/head.php"; ?>

<!-- Container for Logout and Leaderboard buttons -->
<div class="action-buttons-container">
    <!-- Logout Button -->
    <form action="/logout" method="POST">
        <button class="shadow_logout__btn">Logout</button>
    </form>

    <!-- Leaderboard Button -->
    <form action="/App/views/tasks/leaderboard.view.php" method="GET">
        <button class="shadow_leaderboard__btn">Leaderboard</button>
    </form>
</div>

<a href="../create" class="btn">Create Quiz</a>

<div class="quizzes-header-container">
    <h1>Available Quizzes</h1>
</div>

<div class="quizzes-container">
    <!-- Example quiz containers -->
    <div class="container quiz-container">
        <h2>Quiz Title 1</h2>
        <p>Description or content for Quiz 1.</p>
        <form action="/App/views/tasks/leaderboard.view.php" method="GET">
            <button>Leaderboard</button>
        </form>
    </div>
    <!-- Repeat the above block for more quizzes -->
</div>

<?php require "../App/views/components/footer.php"; ?>

<style>
  /* Styling for the container holding the Logout and Leaderboard buttons */
  .action-buttons-container {
    display: flex;
    justify-content: center; /* Center the buttons horizontally */
    gap: 15px;               /* Add some space between the buttons */
    margin-bottom: 20px;      /* Spacing between the buttons and the next content */
  }

  .shadow_logout__btn, .shadow_leaderboard__btn {
    background-color: #00E8FF;
    border: none;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
  }

  .shadow_logout__btn:hover, .shadow_leaderboard__btn:hover {
    background-color: #00B8C1;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    transform: translateY(-2px);
  }

  .shadow_logout__btn:active, .shadow_leaderboard__btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  }

  .quizzes-header-container {
    text-align: center;
    margin-bottom: 30px;
  }

  .quizzes-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
  }

  .container {
    width: 350px;
    height: 500px;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-sizing: border-box;
  }
</style>
