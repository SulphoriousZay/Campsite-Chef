<?php
include 'includes/header.php';

$login_message = '';

// Login authentication handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);

    // Simple authentication check
    if ($email && !empty($password)) {
        $_SESSION['user'] = $email;
        $login_message = "Welcome back! You are successfully logged in as " . htmlspecialchars($email);
    } else {
        $login_message = "Invalid login credentials. Please try again.";
    }
}
?>

<div class="info-block">
    <h2>Member Login</h2>
    <p>Welcome to the Member Portal. This login interface provides returning outdoor enthusiasts, scout leaders, and camp cooks with access to saved meal plans, personalized profile settings, and favorite recipe collections. Logging in unlocks your saved trip histories and equipment preferences, allowing you to instantly load prior grocery lists and build upon existing meal plan templates without starting from scratch.</p>

    <p>Designed for active community members and repeat outdoor trip coordinators, our authentication system ensures your customized camp meal schedules and saved recipes remain accessible across devices. Whether planning from a home desktop or adjusting meal portions on a mobile device at the trailhead, logging in synchronizes your preferences and equipment settings seamlessly across your sessions.</p>

    <p>Please enter your registered email address and password below to authenticate your session. If you have not created an account yet, visit our sign up page to join the Campsite Chef community, unlock saved trip tools, and start customizing your backcountry meal itineraries today.</p>
</div>

<?php if (!empty($login_message)): ?>
    <div style="padding: 10px; background-color: #D1ECF1; color: #0C5460; border-radius: 4px; margin-bottom: 15px;">
        <?php echo $login_message; ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['user'])): ?>
    <p>You are currently logged in as: <strong><?php echo htmlspecialchars($_SESSION['user']); ?></strong></p>
    <p><a href="planner.php">Go to Meal Planner</a></p>
<?php else: ?>
    <form action="login.php" method="POST">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Log In">
    </form>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>