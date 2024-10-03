<?php 
require "../App/views/components/head.php";
?>
<link rel="stylesheet" href="login.css">
<form method="POST" class="center"> 
    <main class="auth-main-login" style="color:#00E8FF">
        <div class="auth-div">
            <h1 class="auth-h1">Log-in</h1>
            <form method="POST" class="auth-form">
                <label class="auth-label" style="color:white">
                    Username
                    <input class="auth-input" type="text" name="username" value="<?= $_POST["username"] ?? "" ?>"/>
                </label>
                <br><br>
                
                <!-- Password input with show/hide button inside -->
                <label class="auth-label" style="color:white; position: relative;">
                    Password
                    <input class="auth-input" type="password" id="password" name="password" value="<?= $_POST["password"] ?? "" ?>" style="padding-right: 50px;" />
                    
                    <!-- Button inside password field -->
                    <button type="button" class="btn-class-name" onclick="togglePassword()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                        <span class="back"></span>
                        <span class="front">Show</span>
                    </button>
                </label>
                <br><br>
                
                <!-- Display password error if exists -->
                <?php if (isset($errors["password"])) { ?>
                    <p class="invalid-data"> <?= $errors["password"] ?> </p>
                <?php } ?>
                
                <button class="auth-button">Submit</button>
            </form>
            <a href="/register">Register</a>
            <?php if(isset($_SESSION["flash"])) { ?>
                <p class="flash"> <?=$_SESSION["flash"]?></p>
            <?php } ?>
        </div>
    </main>
</form>

<script>
function togglePassword() {
    var passwordField = document.getElementById("password");
    var frontText = document.querySelector(".btn-class-name .front");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        frontText.textContent = "Hide"; // Change button text to "Hide" when password is shown
    } else {
        passwordField.type = "password";
        frontText.textContent = "Show"; // Change back to "Show" when password is hidden
    }
}
</script>

<?php require "../App/views/components/footer.php" ?>
