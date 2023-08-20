// /**

// // // <?php
// // // $appTimezone = "Asia/Calcutta";
// // // $dbTimezone = "+05:30";

// // // $configContent = "APP_TIMEZONE={$appTimezone}\n";
// // // $configContent .= "DB_TIMEZONE={$dbTimezone}";

// // // $file = fopen('.env', 'w');
// // // fwrite($file, $configContent);
// // // fclose($file);

// // // echo "Configuration file generated successfully.\n";
// // // ?>






// // <?php
// // $appTimezone = "Asia/Calcutta";
// // $dbTimezone = "+05:30";

// // $envFilePath = '.env';

// // if (file_exists($envFilePath)) {
// //     $content = file_get_contents($envFilePath);
// //     $content = preg_replace('/\bAPP_TIMEZONE=.*\b/', "APP_TIMEZONE={$appTimezone}", $content);
// //     $content = preg_replace('/\bDB_TIMEZONE=.*\b/', "DB_TIMEZONE={$dbTimezone}", $content);

// //     file_put_contents($envFilePath, $content);
// //     echo "Configuration values updated in .env file.\n";
// // } else {
// //     echo "Error: .env file not found.\n";
// // }
// // ?>

// // <?php
// // require __DIR__.'/vendor/autoload.php'; // Include Laravel's autoloader
// // $appTimezone = "Asia/Calcutta";
// // $dbTimezone = "+05:30";

// //$envFilePath = base_path('.env');

// //if (file_exists($envFilePath)) {
//   //  $content = file_get_contents($envFilePath);
//     //$content = preg_replace('/\bAPP_TIMEZONE=.*\b/', "APP_TIMEZONE={$appTimezone}", $content);
//     //$content = preg_replace('/\bDB_TIMEZONE=.*\b/', "DB_TIMEZONE={$dbTimezone}", $content);

//     //file_put_contents($envFilePath, $content);
//     //echo "Configuration values updated in .env file.\n";
// //} else {
//   //  echo "Error: .env file not found.\n";
// //}
// //?> 
// */

// <?php
// // Include Laravel's autoloader
// require __DIR__.'/vendor/autoload.php';

// // Define the timezones you want to set
// $appTimezone = "Asia/Calcutta";
// $dbTimezone = "+05:30";

// // Get the path to the .env file
// $envFilePath = base_path('.env');

// // Check if the .env file exists
// if (file_exists($envFilePath)) {
//     // Read the content of the .env file
//     $content = file_get_contents($envFilePath);

//     // Replace the existing APP_TIMEZONE value with the new one
//     $content = preg_replace('/\bAPP_TIMEZONE=.*\b/', "APP_TIMEZONE={$appTimezone}", $content);

//     // Replace the existing DB_TIMEZONE value with the new one
//     $content = preg_replace('/\bDB_TIMEZONE=.*\b/', "DB_TIMEZONE={$dbTimezone}", $content);

//     // Write the modified content back to the .env file
//     file_put_contents($envFilePath, $content);

//     // Display a success message
//     echo "Configuration values updated in .env file.\n";
// } else {
//     // Display an error message if the .env file is not found
//     echo "Error: .env file not found.\n";
// }
// ?>





<?php
// Include Laravel's autoloader
require __DIR__.'/vendor/autoload.php';

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

// Define the timezones you want to set
$appTimezone = "Asia/Calcutta";
$dbTimezone = "+05:30";

// Check if the .env file exists
if (file_exists($envFilePath)) {
    // Read the content of the .env file
    $content = file_get_contents($envFilePath);

    // Replace the existing APP_TIMEZONE value with the new one
    $content = preg_replace('/\bAPP_TIMEZONE=.*\b/', "APP_TIMEZONE={$appTimezone}", $content);

    // Replace the existing DB_TIMEZONE value with the new one
    $content = preg_replace('/\bDB_TIMEZONE=.*\b/', "DB_TIMEZONE={$dbTimezone}", $content);

    // Write the modified content back to the .env file
    file_put_contents($envFilePath, $content);

    // Display a success message
    echo "Configuration values updated in .env file.\n";
} else {
    // Display an error message if the .env file is not found
    echo "Error: .env file not found.\n";
}
?>







