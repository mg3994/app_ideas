<?php
// Path to the config/app.php file
$configPath = __DIR__ . '/config/app.php';

// Check if the config/app.php file exists
if (file_exists($configPath)) {
    // Read the content of config/app.php
    $content = file_get_contents($configPath);

    // Define the new timezone value
    $newTimezone = "'timezone' => env('APP_TIMEZONE', 'UTC')";

    // Replace only the 'timezone' => 'UTC' line with the new value using a single regex
    $content = preg_replace("/'timezone'\s*=>\s*'UTC'/", $newTimezone, $content, 1);

    // Write the modified content back to config/app.php
    file_put_contents($configPath, $content);

    echo "Timezone configuration in config/app.php updated.\n";
} else {
    echo "Error: config/app.php file not found.\n";
    exit(1);
}
?>
