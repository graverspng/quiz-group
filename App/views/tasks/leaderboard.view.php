<?php
require "../App/backend/leaderboard.php"; // Include the leaderboard backend file

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
    <style>
        .leaderboard-container {
            text-align: left;
            max-width: 400px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        .leaderboard-container ol {
            padding-left: 20px;
        }

        .leaderboard-container li {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="leaderboard-container">
    <h3>Global Leaderboard</h3>
    <ol>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <li><?= htmlspecialchars($user['username']) ?> - <?= htmlspecialchars($user['total_score']) ?> points</li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No players available yet.</li>
        <?php endif; ?>
    </ol>
</div>

</body>
</html>
