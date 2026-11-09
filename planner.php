<?php
include 'includes/header.php';

// Setting a Cookie to remember user gear choice for 30 days
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['preferred_gear'])) {
    $gear_choice = filter_input(INPUT_POST, 'preferred_gear', FILTER_SANITIZE_SPECIAL_CHARS);
    setcookie('favorite_gear', $gear_choice, time() + (86400 * 30), "/");
}
?>

<div class="info-block">
    <h2>Interactive Camp Meal Planner</h2>
    <p>This meal planner is engineered for trip leaders, scout masters, and group campers who need exact food scaling for outdoor trips. Estimating food quantities for large groups in the wilderness can lead to either heavy wasted excess or dangerous food shortages. Our automated planner collects critical variables—such as total party size, trip duration, and cooking gear preference—and calculates exact ingredient metrics needed for your specific adventure.</p>

    <p>Targeted at organizers who value efficiency and organized preparation, this utility handles complex calculations automatically. By defining your camper count and trip length, our back-end engine scales per-person portion sizes up to whole purchasing units. This eliminates manual conversion errors and ensures your grocery budget is spent efficiently on non-perishable and trail-friendly foods.</p>

    <p>Fill out the parameters in the form below to configure your trip details and set your default gear preference. Submitting this form will process your parameters through our scaling engine, saving your gear selection into a session cookie for future visits and transferring your metrics to the dynamic summary page.</p>
</div>

<form action="summary.php" method="POST">
    <label for="party_size">Number of Campers (1-50):</label>
    <input type="number" id="party_size" name="party_size" min="1" max="50" value="4" required>

    <label for="trip_days">Trip Duration (Days 1-16):</label>
    <input type="number" id="trip_days" name="trip_days" min="1" max="16" value="3" required>

    <label for="preferred_gear">Primary Cooking Gear:</label>
    <select id="preferred_gear" name="preferred_gear">
        <option value="Cast Iron">Cast Iron Skillet / Dutch Oven</option>
        <option value="Backpacking Stove">Backpacking Stove</option>
        <option value="Two-Burner Propane">Two-Burner Propane Stove</option>
        <option value="No Cooking">No Cooking / Prepared</option>
    </select>

    <input type="submit" value="Generate Scaled Meal Plan">
</form>

<?php include 'includes/footer.php'; ?>