<?php
include 'includes/header.php';

// Collecting/Checking Cookies for preference tracking
$user_preference = isset($_COOKIE['favorite_gear']) ? $_COOKIE['favorite_gear'] : 'Cast Iron';
?>

<div class="info-block">
    <h2>Welcome to Campsite Chef!</h2>
    <p>Campsite Chef is dedicated to outdoor culinary enthusiasts, backpackers, family campers, and backcountry trip leaders who want to elevate their outdoor dining experience. Cooking over an open fire or camp stove presents unique challenges, from managing strict fuel limits to organizing raw ingredients without refrigeration. Our application bridges the gap between raw outdoor adventure and wholesome, delicious meal planning. Whether you are leading a group of ten scouts or taking a solo weekend trip, Campsite Chef provides tailored tools to streamline your kitchen prep before heading out onto the trail.</p>

    <p>Our platform serves a diverse outdoor audience with specific focus on rustic cooking methods and wilderness food safety. For family campers, we offer simple one-pot recipes that keep clean-up minimal while pleasing picky eaters. For experienced backcountry adventurers, our dynamic algorithms calculate precise lightweight ingredient proportions to minimize pack weight without sacrificing crucial caloric intake. We understand that meal planning is often the most overwhelming part of organizing a camping trip, and our purpose is to transform that stress into an enjoyable part of your prep routine.</p>

    <p>By joining the Campsite Chef community, members gain access to customizable meal planning software, scalable grocery lists, and exclusive member-curated camp recipes. Navigate through our recipe index to explore options categorized by cooking equipment, or head directly to our dynamic Meal Planner to build a customized daily itinerary for your next trip. Check out our sign up page to unlock full community benefits, save favorite recipes, and receive seasonal camp cooking guides straight to your inbox.</p>
</div>

<h3>Featured Cooking Equipment Profile</h3>
<p>Your current active equipment preference is stored as: <strong><?php echo htmlspecialchars($user_preference); ?></strong></p>

<?php include 'includes/footer.php'; ?>