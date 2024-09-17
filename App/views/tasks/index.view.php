<?php require "../App/views/components/head.php"; ?>

<div class="logout-container">
    <form action="/logout" method="POST">
        <button class="shadow_logout__btn">Logout</button>
    </form>
</div>

<div class="quizzes-header-container">
    <h1>Available Quizzes</h1>
</div>


<div class="quizzes-container">
    <div class="container quiz-container">
        <h2>Quiz Title 1</h2>
        <p>Description or content for Quiz 1.</p>
        
        <form action="/leader-board">
        <button>Leaderboard</button>
        </form>
    </div>


    <div class="container quiz-container">
        <h2>Quiz Title 2</h2>
        <p>Description or content for Quiz 2.</p>

        <form action="/leader-board">
        <button>Leaderboard</button>
        </form>

    </div>


    <div class="container quiz-container">
        <h2>Quiz Title 3</h2>
        <p>Description or content for Quiz 3.</p>

        <form action="/leader-board">
        <button>Leaderboard</button>
        </form>
    </div>


    <div class="container quiz-container">
        <h2>Quiz Title 4</h2>
        <p>Description or content for Quiz 4.</p>

        <form action="/leader-board">
        <button>Leaderboard</button>
        </form>
    </div>


    <div class="container quiz-container">
        <h2>Quiz Title 5</h2>
        <p>Description or content for Quiz 5.</p>

        <form action="/leader-board">
        <button>Leaderboard</button>
        </form>
    </div>
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
    margin-bottom: 30px;
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
}

</style>