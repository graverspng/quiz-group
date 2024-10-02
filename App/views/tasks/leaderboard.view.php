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
