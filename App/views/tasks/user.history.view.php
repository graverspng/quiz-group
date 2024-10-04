<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your History</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .history-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ol {
            padding: 0;
            list-style: none;
        }

        li {
            background-color: #f9f9f9;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
        }

        strong {
            color: #555;
        }

        small {
            color: #aaa;
        }

        .navbar {
            text-align: center;
            margin-top: 20px;
        }

        .navbar a {
            text-decoration: none;
            color: #301934;
            background-color: #fff;
            padding: 10px 20px;
            border: 1px solid #301934;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar a:hover {
            background-color: #301934;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="history-container">
    <h1>Your History</h1>
    <ol>
        <?php if (!empty($history)): ?>
            <?php foreach ($history as $item): ?>
                <li>
                    <strong><?= htmlspecialchars($item['action']) ?></strong>
                    <small><?= htmlspecialchars($item['created_at']) ?></small>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No history available.</li>
        <?php endif; ?>
    </ol>
</div>

<div class="navbar">
    <a href="/">Home</a>
</div>

</body>
</html>
