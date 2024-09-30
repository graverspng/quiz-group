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
                <label class="auth-label" style="color:white">
                    Password
                    <input class="auth-input" type="password" name="password" value="<?= $_POST["password"] ?? "" ?>"/>
                </label>
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

<?php require "../App/views/components/footer.php" ?>


