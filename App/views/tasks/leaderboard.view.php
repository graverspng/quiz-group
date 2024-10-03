<?php
// Instantiate the leaderboard
$leaderboard = new Leaderboard();
$users = $leaderboard->getGlobalLeaderboard();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Leaderboard</title>
    <link rel="stylesheet" href="leaderboard.css">
    
</head>
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

.leaderboard {
    background-color: #333; /* Dark gray background for leaderboard */
    height: 500px;
    width: 350px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    text-align: center;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

ol {
    list-style: none;
    padding: 0;
    margin: 0;
}

li {
    padding: 10px;
    background-color: #444;
    margin-bottom: 10px;
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
}

li mark {
    background: none;
    font-weight: bold;
    color: #fff;
}

li small {
    color: #aaa;
}

/* Center the button */
.navbar {
    margin-bottom: 20px; /* Add space below the button */
}

.navbar form {
    display: flex;
    justify-content: center;
}

.navbar button {
    background-color: #301934; /* Initial purple color */
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Initial box shadow */
    transition: all 0.3s ease;
}

/* On hover: darker purple, shadow, and small upward movement */
.navbar button:hover {
    background-color: purple;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    transform: translateY(-2px);
}

/* On active (click): button returns to its original position with a smaller shadow */
.navbar button:active {
    transform: translateY(0);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

    </style>

<body>

<div class="leaderboard">
    <h1>High Scores</h1>
    <ol>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <li>
                    <mark><?= htmlspecialchars($user['username']) ?></mark>
                    <small><?= htmlspecialchars($user['total_score']) ?> points</small>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>
                <mark>No players available yet.</mark>
                <small>-</small>
            </li>
        <?php endif; ?>
    </ol>
</div>
<br>
<div class="navbar">
    <form action="/" method="post">
        <button type="submit" class="template_button_admin">Home</button>
    </form>
</div>

</body>
</html>
