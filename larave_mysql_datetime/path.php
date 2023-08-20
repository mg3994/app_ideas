// /**
// // <?php
// // require __DIR__.'/vendor/autoload.php'; // Include Laravel's autoloader
// // $path = [
// //     "path" => base_path('.env');
// // ];

// // return $path["path"];
// // ?>

// */

// <?php
// // Include Laravel's autoloader
// require __DIR__.'/vendor/autoload.php';

// /**
//  * This script retrieves the absolute path to the .env file.
//  *
//  * @return string The absolute path to the .env file.
//  */
// function getEnvFilePath(): string {
//     // Get the path to the .env file
//     $envFilePath = base_path('.env');

//     return $envFilePath;
// }

// // Define an associative array to hold the path information
// $path = [
//     "path" => getEnvFilePath() // Call the function to get the .env file path
// ];

// // Return the .env file path
// return $path["path"];
// ?>



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
$path = getEnvFilePath();

// Return the .env file path
echo $path;
?>
