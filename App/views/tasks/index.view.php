<?php require "../App/views/components/head.php"; ?>
<link rel="stylesheet" href="index.css">

<div class="quizzes-header-container">
    <h1 class="quizzes-header" style="color: purple">Available Quizzes</h1>
</div>

<div class="action-buttons-container">
    <a href="/leaderboard" class="template_button_admin">Leaderboard</a>

    <?php if (isset($_SESSION["user"]) && $_SESSION["is_admin"]): ?>
        <a href="/create" class="template_button_admin">Create Quiz</a>
    <?php endif; ?>

    <a href="/profile" class="template_button_admin">Profile</a>

    <a href="/history" class="template_button_admin">History</a> <!-- Navigation as link -->
</div>

<div class="quizzes-container">
    <?php foreach ($quizzes as $quiz): ?>
        <div class="card">
            <p class="card__title"><?= htmlspecialchars($quiz['title']) ?></p>
            <div class="card__content">
                <p class="card__description"><?= htmlspecialchars($quiz['description']) ?></p>
                <form action="/take_quiz?id=<?= $quiz['quiz_id'] ?>" method="POST">
                    <input type="hidden" name="quiz_id" value="<?= $quiz['quiz_id'] ?>">
                    <button class="shadow_logout__btn">Take Quiz</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require "../App/views/components/footer.php"; ?>

<style>
    body {
        background-color: #121212;
        margin: 0;
        font-family: 'Open Sans', sans-serif;
        margin-bottom: 700px;
    }

    .quizzes-header-container {
        width: 80%;
        max-width: 600px;
        text-align: center;
        margin: 0 auto 30px;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
    }

    .quizzes-header {
        font-size: 36px;
        color: purple;
        font-weight: bold;
        margin: 0;
    }

    .action-buttons-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .quizzes-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 0 10px;
    }

    .card {
        position: relative;
        width: 300px;
        height: 200px;
        background-color: #f2f2f2;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        perspective: 1000px;
        box-shadow: 0 0 0 5px #301934;
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
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
        color: black;
        font-weight: 700;
        text-align: center;
    }

    .card__description {
        margin: 10px 0 0;
        font-size: 14px;
        color: black;
        line-height: 1.4;
        text-align: center;
    }

    .template_button_admin, .shadow_logout__btn {
        background-color: #301934;
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

    .template_button_admin:hover, .shadow_logout__btn:hover {
        background-color: purple;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        transform: translateY(-2px);
    }

    .template_button_admin:active, .shadow_logout__btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }
</style>
