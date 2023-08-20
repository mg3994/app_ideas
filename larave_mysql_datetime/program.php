<?php
/**
 * This script retrieves the absolute path to the .env file.
 *
 * @return string The absolute path to the .env file.
 */
function getEnvFilePath(): string {
    // Get the directory of the current script
    $scriptDirectory = __DIR__;

    // Construct the absolute path to the .env file
    $envFilePath = $scriptDirectory . '/.env';

    return $envFilePath;
}

// Call the function to get the .env file path
$envFilePath = getEnvFilePath();
echo $envFilePath . "<br>";

// Define the timezones you want to set
$appTimezone = "Asia/Calcutta";
$dbTimezone = "+05:30";

// Check if the .env file exists
if (file_exists($envFilePath)) {
    // Read the content of the .env file
    $lines = file($envFilePath);

    // Modify the content in memory
    foreach ($lines as &$line) {
        if (preg_match('/^\s*APP_TIMEZONE\s*=\s*(.*)$/i', $line, $matches)) {
            $line = "APP_TIMEZONE = '{$appTimezone}'\n";
        }
        if (preg_match('/^\s*DB_TIMEZONE\s*=\s*(.*)$/i', $line, $matches)) {
            $line = "DB_TIMEZONE = '{$dbTimezone}'\n";
        }
    }

    // Write the modified content back to the .env file
    file_put_contents($envFilePath, implode('', $lines));

    // Display a success message
    echo "Configuration values updated in .env file.\n";
} else {
    // Display an error message if the .env file is not found
    echo "Error: .env file not found.\n";
}
?>
