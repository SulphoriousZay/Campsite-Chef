<?php
include 'includes/header.php';

// Custom Array of Recipes
$recipes = [
    [
        'title' => 'Campfire Cast Iron Chili',
        'gear' => 'Cast Iron',
        'category' => 'Dinner',
        'desc' => 'A hearty beef and bean chili simmered slowly over glowing campfire embers.'
    ],
    [
        'title' => 'Trailside Oatmeal & Berries',
        'gear' => 'Backpacking Stove',
        'category' => 'Breakfast',
        'desc' => 'Quick rolled oats mixed with dried berries, chia seeds, and brown sugar.'
    ],
    [
        'title' => 'One-Pot Skillet Fajitas',
        'gear' => 'Cast Iron',
        'category' => 'Dinner',
        'desc' => 'Sliced bell peppers, onions, and seasoned chicken seared in a hot cast iron skillet.'
    ],
    [
        'title' => 'Trail Wrap',
        'gear' => 'No Cooking',
        'category' => 'Lunch',
        'desc' => 'Tortilla wrap filled with peanut butter, sliced bananas, granola, and honey.'
    ]
];

// String Function & GET processing for filtering
$selected_category = isset($_GET['gear']) ? trim($_GET['gear']) : 'All';
?>

<div class="info-block">
    <h2>Explore Camp Recipes</h2>
    <p>This recipe index is tailored specifically for outdoor cooks looking for meal ideas based on their available equipment. Outdoor cooking equipment varies widely depending on your style of camping. Backpackers require ultra-light, single-burner stoves, while car campers can utilize heavy cast iron Dutch ovens and multi-burner propane stoves. Our directory eliminates the guesswork by allowing you to filter culinary options according to the gear you plan to pack for your trip.</p>

    <p>Targeted at trip organizers and camp cooks of all skill levels, this index showcases recipes designed to withstand temperature variables and limited preparation surfaces. Each recipe listed provides specific cooking equipment requirements, prep times, and core ingredients optimized for trail storage. Browsing our collection ensures you choose meals that match your skill level and campsite setup, avoiding complex preparations when you only have a single burner available.</p>

    <p>Select an equipment filter below to narrow down your options, or view the complete master collection. Once you identify meals that fit your expedition, you can use our dynamic Meal Planner tool to auto-generate exact grocery scaling based on your total party size and trip length.</p>
</div>

<h3>Filter by Equipment:</h3>
<form method="GET" action="recipes.php">
    <select name="gear" onchange="this.form.submit()">
        <option value="All" <?php if($selected_category == 'All') echo 'selected'; ?>>All Equipment Types</option>
        <option value="Cast Iron" <?php if($selected_category == 'Cast Iron') echo 'selected'; ?>>Cast Iron</option>
        <option value="Backpacking Stove" <?php if($selected_category == 'Backpacking Stove') echo 'selected'; ?>>Backpacking Stove</option>
        <option value="No Cooking" <?php if($selected_category == 'No Cooking') echo 'selected'; ?>>No Cooking</option>
    </select>
</form>

<table>
    <thead>
        <tr>
            <th>Recipe Title</th>
            <th>Meal Category</th>
            <th>Required Gear</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop demonstration over filtered array
        foreach ($recipes as $recipe) {
            if ($selected_category === 'All' || $recipe['gear'] === $selected_category) {
                echo "<tr>";
                echo "<td>" . strtoupper($recipe['title']) . "</td>"; // String function usage
                echo "<td>" . htmlspecialchars($recipe['category']) . "</td>";
                echo "<td>" . htmlspecialchars($recipe['gear']) . "</td>";
                echo "<td>" . htmlspecialchars($recipe['desc']) . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

<?php include 'includes/footer.php'; ?>