// // // /**
// // // // <?php
// // // // require __DIR__.'/vendor/autoload.php'; // Include Laravel's autoloader
// // // // $path = [
// // // //     "path" => base_path('.env');
// // // // ];

// // // // return $path["path"];
// // // // ?>

// // // */

// // // <?php
// // // // Include Laravel's autoloader
// // // require __DIR__.'/vendor/autoload.php';

// // // /**
// // //  * This script retrieves the absolute path to the .env file.
// // //  *
// // //  * @return string The absolute path to the .env file.
// // //  */
// // // function getEnvFilePath(): string {
// // //     // Get the path to the .env file
// // //     $envFilePath = base_path('.env');

// // //     return $envFilePath;
// // // }

// // // // Define an associative array to hold the path information
// // // $path = [
// // //     "path" => getEnvFilePath() // Call the function to get the .env file path
// // // ];

// // // // Return the .env file path
// // // return $path["path"];
// // // ?>



// // <?php
// // /**
// //  * This script retrieves the absolute path to the .env file.
// //  *
// //  * @return string The absolute path to the .env file.
// //  */
// // function getEnvFilePath() {
// //     // Get the directory of the current script
// //     $scriptDirectory = __DIR__;

// //     // Construct the absolute path to the .env file
// //     $envFilePath = $scriptDirectory . '/.env';

// //     return [$envFilePath];
// // }

// // // Call the function to get the .env file path
// // $path = getEnvFilePath();

// // // Return the .env file path
// // echo $path;
// // ?>





// <?php
// /**
//  * This script retrieves the absolute path to the .env file.
//  *
//  * @return array An array containing the absolute path to the .env file.
//  */
// function getEnvFilePath(): array {
//     // Get the directory of the current script
//     $scriptDirectory = __DIR__;

//     // Construct the absolute path to the .env file
//     $envFilePath = $scriptDirectory . '\.env';

//     return [$envFilePath];
// }

// // Call the function to get the .env file path
// $path = getEnvFilePath();

// // Display each path element of the array in a new line
// foreach ($path as $element) {
//     echo $element . PHP_EOL;
// }
// return $path; // for my insight app , i want to return or nothing
// ?>



<?php
/**
 * This script retrieves the absolute path to the .env file.
 *
 * @return array An array containing the absolute path to the .env file.
 */
function getEnvFilePath(): array {
    // Get the directory of the current script
    $scriptDirectory = __DIR__;

    // Construct the absolute path to the .env file
    $envFilePath = $scriptDirectory . '\.env';

    return [$envFilePath,]; //add more like $scriptDirectory."\package.json"
}

// Call the function to get the .env file path
$path = getEnvFilePath();

// Display each path element of the array in a new line
foreach ($path as $element) {
    
    echo $element . PHP_EOL;
    exec('code ' . $element); // to open in vs code
}
return $path; // for my insight app , i want to return or nothing
?>

