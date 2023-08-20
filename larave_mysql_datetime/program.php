// // <?php
// // $appTimezone = "Asia/Calcutta";
// // $dbTimezone = "+05:30";

// // $configContent = "APP_TIMEZONE={$appTimezone}\n";
// // $configContent .= "DB_TIMEZONE={$dbTimezone}";

// // $file = fopen('.env', 'w');
// // fwrite($file, $configContent);
// // fclose($file);

// // echo "Configuration file generated successfully.\n";
// // ?>


// <?php
// $appTimezone = "Asia/Calcutta";
// $dbTimezone = "+05:30";

// $envFilePath = '.env';

// if (file_exists($envFilePath)) {
//     $content = file_get_contents($envFilePath);
//     $content = preg_replace('/\bAPP_TIMEZONE=.*\b/', "APP_TIMEZONE={$appTimezone}", $content);
//     $content = preg_replace('/\bDB_TIMEZONE=.*\b/', "DB_TIMEZONE={$dbTimezone}", $content);

//     file_put_contents($envFilePath, $content);
//     echo "Configuration values updated in .env file.\n";
// } else {
//     echo "Error: .env file not found.\n";
// }
// ?>


<?php
require __DIR__.'/vendor/autoload.php'; // Include Laravel's autoloader
$appTimezone = "Asia/Calcutta";
$dbTimezone = "+05:30";

$envFilePath = base_path('.env');

if (file_exists($envFilePath)) {
    $content = file_get_contents($envFilePath);
    $content = preg_replace('/\bAPP_TIMEZONE=.*\b/', "APP_TIMEZONE={$appTimezone}", $content);
    $content = preg_replace('/\bDB_TIMEZONE=.*\b/', "DB_TIMEZONE={$dbTimezone}", $content);

    file_put_contents($envFilePath, $content);
    echo "Configuration values updated in .env file.\n";
} else {
    echo "Error: .env file not found.\n";
}
?>

