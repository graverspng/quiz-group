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
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 450px;
            height: 100vh;
            margin: 0;
            background: radial-gradient(ellipse farthest-corner at center top, #f39264 0%, #f2606f 100%);
            color: #fff;
            font-family: 'Open Sans', sans-serif;
        }

        /* Navigation bar styling */
        .navbar {
            display: flex;
            justify-content: center;
            padding: 10px;
            position: relative;
            z-index: 10;
        }

        .navbar button {
            background-color: #00E8FF;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .navbar button:hover {
            background-color: #00B8C1;
        }

        /* Leaderboard styling */
        .leaderboard {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px; /* Increased width */
            height: 400px; /* Increased height */
            background: linear-gradient(to bottom, #3a404d, #181c26);
            border-radius: 10px;
            box-shadow: 0 7px 30px rgba(62, 9, 11, .3);
            overflow: auto; /* Allow scrolling if needed */
        }

        .leaderboard h1 {
            font-size: 24px; /* Increased font size */
            color: #e1e1e1;
            padding: 12px 13px 18px;
            text-align: center; /* Center title */
        }

        .leaderboard ol {
            padding-left: 20px;
        }

        .leaderboard li {
            position: relative;
            font-size: 16px; /* Increased font size */
            padding: 18px 10px 18px 10px; /* Adjusted padding */
            cursor: pointer;
        }

        .leaderboard li mark {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 18px 10px;
            background: none;
            color: #fff;
        }

        .leaderboard li small {
            display: block;
            text-align: right;
        }
    </style>
</head>
<body>

<div class="navbar">
    <form action="/" method="post">
        <button class="fourOfour-button" type="submit">Home</button>
    </form>
</div>

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

</body>
</html>
