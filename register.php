<?php
include 'includes/header.php';

$message = '';

// Form processing and input string sanitization
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {
        // String functions for display formatting
        $clean_username = trim(ucfirst($username));
        $message = "Congrats! Welcome to the Campsite Chef Club, " . htmlspecialchars($clean_username) . ". Your account registration is complete.";
    } else {
        $message = "Please complete all fields with valid information.";
    }
}
?>

<div class="info-block">
    <h2>Join the Campsite Chef Club</h2>
    <p>Signing up is open to all outdoor cooks, trip coordinators, and campsite enthusiasts looking to expand their backcountry culinary skills. Becoming a registered member connects you with a community of wilderness food enthusiasts who share tested outdoor recipes, cooking techniques, and equipment recommendations. Membership gives you access to premium site tools, including saved meal plan templates, customizable grocery list exports, and direct community recipe submissions.</p>

    <p>Our target audience includes beginner campers looking for foundational camp stove guidance, experienced backcountry chefs wanting to share complex Dutch oven recipes, and group leaders requiring organized tools for expedition logistics. By creating an account, you unlock member-only features designed to streamline trip preparation and help you master cooking over wood fires, charcoal, and portable gas stoves under any weather condition.</p>

    <p>Complete the membership registration form below to set up your account profile. Once registered, you can log into the site, save your preferred equipment profiles, access exclusive backcountry meal plans, and receive our monthly newsletter featuring seasonal wilderness recipes and camp kitchen gear reviews.</p>
</div>

<?php if (!empty($message)): ?>
    <div style="padding: 10px; background-color: #D4EDDA; color: #155724; border-radius: 4px; margin-bottom: 15px;">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<form action="register.php" method="POST">
    <label for="username">Full Name or Camper Handle:</label>
    <input type="text" id="username" name="username" required>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Create Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Register Account">
</form>

<?php include 'includes/footer.php'; ?>