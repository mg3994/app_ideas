<?php
// Include Laravel's autoloader if Laravel is available
if (defined('LARAVEL_START')) {
    require __DIR__.'/vendor/autoload.php';
}

// fid that text
function findLineNumberInFile($filePath, $targetText) {
    $lines = file($filePath);
    foreach ($lines as $lineNumber => $line) {
        if (strpos($line, $targetText) !== false) {
            return $lineNumber + 1; // Line numbers are 1-based
        }
    }
    return false; // Target text not found in the file
}
/**
 * This script retrieves the absolute path to the .env file.
 *
 * @return string The absolute path to the .env file.
 */
function getEnvFilePath(): string {
    // If Laravel is available, use base_path()
    if (function_exists('base_path')) {
        return base_path('.env');
    }
   
    // Otherwise, construct the path based on the current script's directory
    $scriptDirectory = __DIR__;
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

    // Flags to track whether the variables exist
    $appTimezoneExists = false;
    $dbTimezoneExists = false;

    // Modify the content in memory
    foreach ($lines as &$line) {
        if (preg_match('/^\s*APP_TIMEZONE\s*=\s*(.*)$/i', $line, $matches)) {
            $line = "APP_TIMEZONE={$appTimezone}\n";
            $appTimezoneExists = true;
        }
        if (preg_match('/^\s*DB_TIMEZONE\s*=\s*(.*)$/i', $line, $matches)) {
            $line = "DB_TIMEZONE={$dbTimezone}\n";
            $dbTimezoneExists = true;
        }
    }

    // If the variables don't exist, add them to the end of the file
    if (!$appTimezoneExists) {
        $lines[] = "APP_TIMEZONE={$appTimezone}\n";
    }
    if (!$dbTimezoneExists) {
        $lines[] = "DB_TIMEZONE={$dbTimezone}\n";
    }

    // Write the modified content back to the .env file
    file_put_contents($envFilePath, implode('', $lines));

    

    // Display a success message
    echo "Configuration values updated in .env file.\n";


    $lineNumber = findLineNumberInFile($envFilePath, $lines);
if ($lineNumber !== false) {
    openFileInVSCode($envFilePath, $lineNumber, $lines);
} else {
    echo "Text not found in the file.";
}

} else {
    // Display an error message if the .env file is not found
    echo "Error: .env file not found.\n";
}
?>
