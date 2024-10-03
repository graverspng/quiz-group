<?php require "../App/views/components/head.php" ?>
<link rel="stylesheet" href="register.css">
<div class="center">
<main class="auth-main-reg">
    <div class="auth-div">
        <h1 class="auth-h1" style="color:#00E8FF">Register</h1>
        <form method="POST" class="auth-form">
            <label class="auth-label" style="color:white">
                Username
                <input class="auth-input" name="username" value="<?= $_POST["username"] ?? "" ?>"/>
            </label>
            <?php if (isset($errors["username"])) { ?>
                <p class="invalid-data"> <?= $errors["username"] ?> </p>
            <?php } ?>
            <label class="auth-label" style="color:white">
                Email
                <input class="auth-input" type="email" name="email" value="<?= $_POST["email"] ?? "" ?>"/>
            </label>
            <?php if (isset($errors["email"])) { ?>
                <p class="invalid-data"> <?= $errors["email"] ?> </p>
            <?php } ?>
            <label class="auth-label" style="color:white">
                Password
                <br>
                <div class="password-container">
                    <input class="auth-input" id="password" type="password" name="password" value="<?= $_POST["password"] ?? "" ?>" />
                    <button type="button" class="btn-class-name" onclick="togglePassword()">
                        <span class="back"></span>
                        <span class="front">Show</span>
                    </button>
                </div>
            </label>
            <?php if (isset($errors["password"])) { ?>
                <p class="invalid-data"> <?= $errors["password"] ?> </p>
            <?php } ?>
            <span style="font-size: 12px; color:white;">(8 chars: 1 uppercase, 1 number, 1 symbol)</span>
            <br><br>
            <button class="auth-button" style="background-color:#00E8FF;">Submit</button>
        </form>
        <a href="/login">Log-in</a>
    </div>
</main>
</div>

<script>
function togglePassword() {
    var passwordField = document.getElementById("password");
    var frontText = document.querySelector(".btn-class-name .front");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        frontText.textContent = "Hide";
    } else {
        passwordField.type = "password";
        frontText.textContent = "Show"; 
    }
}
</script>

<?php require "../App/views/components/footer.php" ?>
