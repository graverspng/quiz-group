<?php require "../App/views/components/head.php"; ?>

<div class="quizzes-header-container">
    <h1>Available Quizzes</h1>
</div>

<div class="action-buttons-container">
    <!-- Logout Button -->
    <form action="/logout" method="POST">
        <button class="shadow_logout__btn">Logout</button>
    </form>

    <!-- Leaderboard Button -->
    <form action="/App/views/tasks/leaderboard.view.php" method="GET">
        <button class="shadow_leaderboard__btn">Leaderboard</button>
    </form>

    <?php if (isset($_SESSION["user"]) && $_SESSION["is_admin"]): ?>

        <form action="/create" method="POST">
            <button class="create_button_admin">Create Quiz</button>
        </form>
    <?php endif; ?>

</div>

<div class="quizzes-container">
    <?php if (isset($quizzes) && !empty($quizzes)): ?>
        <?php foreach ($quizzes as $quiz): ?>
            <div class="card">
            <p class="card__title"><?= htmlspecialchars($quiz['title']) ?></p>
                <div class="card__content">
                    <p class="card__description"><?= htmlspecialchars($quiz['description']) ?></p>
                    <a href="" class="btn">Take Quiz</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No quizzes available.</p>
    <?php endif; ?>
</div>

<?php require "../App/views/components/footer.php"; ?>


<style>
  /* Styling for the container holding the Logout and Leaderboard buttons */
  .action-buttons-container {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 20px;
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

  /* Card style */
  .card {
    position: relative;
    width: 300px;
    height: 200px;
    background-color: #f2f2f2;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    perspective: 1000px;
    box-shadow: 0 0 0 5px #ffffff80;
    transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  }

  .card__image {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
  }

  .card__content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding: 20px;
    box-sizing: border-box;
    background-color: rgba(242, 242, 242, 0.9);
    transform: rotateX(-90deg);
    transform-origin: bottom;
    transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  }

  .card:hover .card__content {
    transform: rotateX(0deg);
  }

  .card__title {
    margin: 0;
    font-size: 24px;
    color: #333;
    font-weight: 700;
  }

  .card__description {
    margin: 10px 0 0;
    font-size: 14px;
    color: #777;
    line-height: 1.4;
  }

  .create_button_admin {
  background-color: #6aff00;
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

.create_button_admin:hover{
  background-color: rgb(3, 112, 6);
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
  transform: translateY(-2px);
}

.create_button_admin:active{
  transform: translateY(0);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}
</style>
