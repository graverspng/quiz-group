<?php require "../App/views/components/head.php"; ?>
<main class="create-edit-main">
    <div class="container-profile">
        <div class="create-edit-div-wide">
            <div class="profile-logout-box">
                <h1 class="profile-header">Hello, <?= htmlspecialchars($_SESSION["username"]) ?> 👋🏼
                    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                        <span class="admin-badge">(Admin)</span>
                    <?php endif; ?>
                </h1>
            </div>
            <div class="profile-div">
                <form method="POST" class="auth-form" onsubmit="return confirm('Are you sure you want to change your username?');">
                    <label class="auth-label">
                        New Username:
                        <input class="auth-input" type="text" name="new_username" value="<?= $_POST["new_username"] ?? "" ?>"/>
                    </label>
                    <button class="auth-button" name="update_username">Update Username</button>
                </form>
                <?php if (isset($errors["new_username"])) { ?>
                    <p class="invalid-data"> <?= $errors["new_username"] ?> </p>
                <?php } ?>
            </div>
            <div class="profile-div">
                <form method="POST" class="auth-form" onsubmit="return confirm('Are you sure you want to change your email address?');">
                    <label class="auth-label">
                        New Email:
                        <input class="auth-input" type="email" name="new_email" value="<?= $_POST["new_email"] ?? "" ?>"/>
                    </label>
                    <button class="auth-button" name="update_email">Update Email</button>
                </form>
                <?php if (isset($errors["new_email"])) { ?>
                    <p class="invalid-data"> <?= $errors["new_email"] ?> </p>
                <?php } ?>
                <form method="POST" class="auth-form" onsubmit="return confirm('Are you sure you want to change your password?');">
                    <label class="auth-label">
                        New Password:
                        <input class="auth-input" type="password" name="new_password"/>
                    </label>
                    <button class="auth-button" name="update_password">Update Password</button>
                </form>
                <?php if (isset($errors["new_password"])) { ?>
                    <p class="invalid-data"> <?= $errors["new_password"] ?> </p>
                <?php } ?>
            </div>
            <br>
            <div class="profile-logout-box">

                <h2>Log out?</h2>
                <form action="/logout" method="POST">
                    <button class="shadow_logout__btn">Logout</button>
                </form>

            <h2> Log out? </h2>
            <form action="/logout" method="POST">
                <button class="shadow_logout__btn">Logout</button>
            </form>

            <form action="/" method="POST">
                <button class="shadow_logout__btn">home</button>
            </form>

            </div>
            <br>
        </div>
    </div>
</main>

<?php require "../App/views/components/footer.php"; ?>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #282c34; /* Darker background color */
    color: #ffffff; /* White text color */
}

.create-edit-main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full height of viewport */
}

.container-profile {
    max-width: 600px; /* Limit width */
    width: 100%;
    background-color: #3c3f44; /* Darker box background */
    border-radius: 12px; /* More rounded corners */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Deeper shadow for a floating effect */
    padding: 30px; /* Padding inside box */
    box-sizing: border-box;
}

.profile-header {
    text-align: center; /* Center header text */
    color: #00E8FF; /* Header color */
    margin-bottom: 20px; /* Space below header */
    font-size: 24px; /* Larger font size for header */
}

.admin-badge {
    color: #ffcc00; /* Bright color for admin badge */
}

.profile-div {
    margin-bottom: 20px; /* Space between profile sections */
    padding: 20px; /* Inner padding */
    border-radius: 8px; /* Rounded corners */
    background-color: #474a51; /* Box background color */
    transition: background-color 0.3s; /* Smooth transition for hover effect */
}

.profile-div:hover {
    background-color: #5a5d62; /* Darker shade on hover */
}

.auth-label {
    display: block; /* Make labels block elements */
    margin-bottom: 10px; /* Space below labels */
    color: #ffffff; /* Label color */
}

.auth-input {
    width: calc(100% - 20px); /* Full width minus padding */
    padding: 12px; /* Padding inside input */
    border: 1px solid #00E8FF; /* Light border for input */
    border-radius: 5px; /* Rounded corners for input */
    background-color: #383b40; /* Darker background for input */
    color: #ffffff; /* White text color for input */
    font-size: 16px; /* Larger font size for input */
}

.auth-input::placeholder {
    color: #cccccc; /* Placeholder text color */
}

.auth-button {
    display: block; /* Make buttons block elements */
    width: 100%; /* Full width for buttons */
    padding: 12px; /* Padding inside button */
    border: none; /* Remove border */
    border-radius: 5px; /* Rounded corners */
    background-color: #00E8FF; /* Button color */
    color: #ffffff; /* Text color */
    cursor: pointer; /* Pointer cursor on hover */
    margin-top: 10px; /* Space above button */
    transition: background-color 0.3s; /* Smooth transition for button color */
}

.auth-button:hover {
    background-color: #00c1d4; /* Darker shade on hover */
}

.invalid-data {
    color: #ff5555; /* Red color for error messages */
    text-align: center; /* Center error messages */
}

.profile-logout-box {
    text-align: center; /* Center logout section text */
}
</style>
