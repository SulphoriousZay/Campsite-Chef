<?php
include 'includes/header.php';

// Custom Function Definition with Math operations
function calculate_groceries($party_size, $days, $base_qty) {
    $raw_total = $party_size * $days * $base_qty;
    return ceil($raw_total); // Round up to next full purchasing unit
}

// Custom String manipulation function
function format_summary_header($text) {
    return "<strong>" . strtoupper(trim($text)) . "</strong>";
}

// Processing POST Data
$party_size = filter_input(INPUT_POST, 'party_size', FILTER_VALIDATE_INT) ?: 1;
$trip_days = filter_input(INPUT_POST, 'trip_days', FILTER_VALIDATE_INT) ?: 1;
$gear = filter_input(INPUT_POST, 'preferred_gear', FILTER_SANITIZE_SPECIAL_CHARS) ?: 'Standard';

// Multidimensional Master Array
$base_ingredients = [
    'Ground Beef (lbs)' => 0.33,
    'Canned Beans (cans)' => 0.5,
    'Oats (cups)' => 0.75,
    'Tortillas (pack)' => 0.2
];
?>

<div class="info-block">
    <h2>Your Scaled Trip Itinerary & Grocery Summary</h2>
    <p>This dynamic summary page is generated specifically for outdoor leaders who need actionable, scaled shopping requirements for their upcoming camp trips. Based on the trip length and camper headcount entered on the previous page, our algorithms calculate precise total ingredient units required. This tailored view ensures you purchase the exact quantity of food necessary without over-packing heavy cooler weight.</p>

    <p>Designed for group trip coordinators, family planners, and scout leaders, this custom report translates individual base portions into aggregated bulk purchasing totals. The metrics displayed in the table below utilize mathematical rounding algorithms to round up fractional quantities to whole retail pack sizes. This approach prevents running short on food while miles away from the nearest grocery store.</p>

    <p>Review your customized output below, print or save your grocery list, and refer back to your gear configurations when packing your kitchen box. If your group size changes or trip dates adjust, simply return to the Meal Planner page to instantly regenerate your adjusted grocery totals.</p>
</div>

<h3>Trip Summary Details</h3>
<p>Header: <?php echo format_summary_header("Expedition Calculation Report"); ?></p>
<p>Total Campers: <strong><?php echo $party_size; ?></strong> | Duration: <strong><?php echo $trip_days; ?> Days</strong> | Primary Equipment: <strong><?php echo htmlspecialchars($gear); ?></strong></p>

<h3>Consolidated Scaled Grocery List</h3>
<table>
    <thead>
        <tr>
            <th>Item / Ingredient</th>
            <th>Base Per Person/Day Portion</th>
            <th>Total Units to Purchase</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop demonstration over multidimensional array using function
        foreach ($base_ingredients as $item => $base_qty) {
            $total_needed = calculate_groceries($party_size, $trip_days, $base_qty);
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item) . "</td>";
            echo "<td>" . $base_qty . "</td>";
            echo "<td><strong>" . $total_needed . "</strong></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'includes/footer.php'; ?>