<div>
    <style>
        body {
            background-color: #3A3B3C;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: black;
            margin-bottom: 30px;
        }

        /* Form Container */
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }

        /* Form Input Fields */
        p {
            margin-bottom: 15px;
            color: #333;
        }

        input[type="text"], input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            margin-top: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #00B8C1;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            outline: none;
        }

        /* Submit Button */
        button {
            background-color: #00E8FF;
            color: white;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #00B8C1;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        /* Home Link */
        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #00E8FF;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Spacing between form sections */
        .Question-1 {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ccc;
        }

        /* Centering buttons */
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

    </style>

    <h1>Create Quiz</h1>

    <form action="/create" method="POST">
        <div>
            <p>Theme: <input type="text" name="title" placeholder="Enter quiz Theme" required></p>
            <p>Description: <input type="text" name="description" placeholder="Enter quiz Description" required></p>
            
            <br>

            <?php for ($i = 1; $i <= 1; $i++): ?>
                <div class="Question-<?php echo $i; ?>">
                    <p>Correct Option Index: <input type="number" name="questions[<?php echo $i; ?>][correct]" min="1" max="4" placeholder="1-4" required></p>
                    <p>Question <?php echo $i; ?>: <input type="text" name="questions[<?php echo $i; ?>][text]" placeholder="Enter question" required></p>
                    <p>Option 1: <input type="text" name="questions[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                    <p>Option 2: <input type="text" name="questions[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                    <p>Option 3: <input type="text" name="questions[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                    <p>Option 4: <input type="text" name="questions[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                </div>
            <?php endfor; ?>

            <button type="submit">Create Quiz</button>
        </div>
    </form>

    <a href="/">Home</a>
</div>
