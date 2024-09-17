<?php require "../App/views/components/head.php"; ?>

<div class="logout-container">
    <form action="/logout" method="POST">
        <button class="shadow_logout__btn">Logout</button>
    </form>
</div>

<div class="quizzes-header-container">
    <h1>Available Quizzes</h1>
</div>

<!-- Flex container for quizzes -->
<div class="quizzes-container">
    <!-- Quiz Container 1 -->
    <div class="container quiz-container">
        <h2>Quiz Title 1</h2>
        <p>Description or content for Quiz 1.</p>
        <!-- Add additional content or links here -->
    </div>

    <!-- Quiz Container 2 -->
    <div class="container quiz-container">
        <h2>Quiz Title 2</h2>
        <p>Description or content for Quiz 2.</p>
        <!-- Add additional content or links here -->
    </div>

    <!-- Quiz Container 3 -->
    <div class="container quiz-container">
        <h2>Quiz Title 3</h2>
        <p>Description or content for Quiz 3.</p>
        <!-- Add additional content or links here -->
    </div>

    <!-- Quiz Container 4 -->
    <div class="container quiz-container">
        <h2>Quiz Title 4</h2>
        <p>Description or content for Quiz 4.</p>
        <!-- Add additional content or links here -->
    </div>

    <!-- Quiz Container 5 -->
    <div class="container quiz-container">
        <h2>Quiz Title 5</h2>
        <p>Description or content for Quiz 5.</p>
        <!-- Add additional content or links here -->
    </div>
</div>

<?php require "../App/views/components/footer.php"; ?>

<style>
    /* General container styling */
.container {
    width: 350px;  /* Set width */
    height: 500px; /* Set height */
    margin: 10px;  /* Space between boxes */
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-sizing: border-box; /* Ensures padding and border are included in the width/height */
}

/* Center the logout form */
.logout-container {
    text-align: center;
    margin-bottom: 30px;
}

/* Center the quizzes header */
.quizzes-header-container {
    text-align: center;
    margin-bottom: 30px;
}

/* Flex container for quiz boxes */
.quizzes-container {
    display: flex;
    flex-wrap: wrap; /* Allows wrapping if not enough space */
    justify-content: center; /* Center align items horizontally */
    gap: 20px; /* Space between quiz boxes */
}

/* Additional styling for the logout button */
.shadow_logout__btn {
    /* Add specific styles for the logout button here */
}

</style>