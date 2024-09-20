<?php require "../App/views/components/head.php"; ?>

<div class="logout-container">
    <form action="/logout" method="POST">
        <button class="shadow_logout__btn">Logout</button>
    </form>
</div>

<a href="/create" class="btn">Create Quiz</a>

<div class="quizzes-header-container">
    <h1>Available Quizzes</h1>
</div>

<div class="quizzes-container">
    <?php if (!empty($quizzes)): ?>
        <?php foreach ($quizzes as $quiz): ?>
            <div class="container quiz-container">
                <h2><?php echo htmlspecialchars($quiz['title']); ?></h2>
                <p><?php echo htmlspecialchars($quiz['description']); ?></p>
                
                <form action="/leader-board" method="POST">
                    <button>Leaderboard</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No quizzes available yet. Create one!</p>
    <?php endif; ?>
</div>

<?php require "../App/views/components/footer.php"; ?>

<style>
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

  .logout-container {
    text-align: center;
    position: relative;
    top: 10px;
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

  .shadow_logout__btn {
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

  .shadow_logout__btn:hover {
    background-color: #00B8C1;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    transform: translateY(-2px);
  }

  .shadow_logout__btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  }
</style>
