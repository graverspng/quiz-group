<div>
    <h1>Create Quiz</h1>

    <form action="/create" method="POST">
        <div>
            <p>Theme: <input type="text" name="title" placeholder="Enter quiz Theme" required></p>
            <p>Description: <input type="text" name="description" placeholder="Enter quiz Description" required></p>
            
            <br>

            <?php for ($i = 1; $i <= 1; $i++): ?>
                <div class="Question-<?php echo $i; ?>">
                    <p>Correct Option Index: <input type="number" name="options[<?php echo $i; ?>][correct]" min="1" max="4" placeholder="1-4" required></p>
                    <p>Question <?php echo $i; ?>: <input type="text" name="questions[<?php echo $i; ?>][text]" placeholder="Enter question" required></p>
                    <p>Option 1: <input type="text" name="options[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                    <p>Option 2: <input type="text" name="options[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                    <p>Option 3: <input type="text" name="options[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                    <p>Option 4: <input type="text" name="options[<?php echo $i; ?>][options][]" placeholder="Enter option" required></p>
                </div>
            <?php endfor; ?>
            <button type="submit">Create Quiz</button>
        </div>
    </form>

    <a href="/">Home</a>
</div>
