<?php
// Read configuration from .env file
$envFilePath = __DIR__ . '/.env';
if (file_exists($envFilePath)) {
    $config = parse_ini_file($envFilePath);
} else {
    echo "Error: .env file not found.\n";
    exit(1);
}

// Extract database configuration
$dbHost = $config['DB_HOST'];
$dbPort = $config['DB_PORT'];
$dbName = $config['DB_DATABASE'];
$dbUsername = $config['DB_USERNAME'];
$dbPassword = $config['DB_PASSWORD'];
$dbTimezone = $config['DB_TIMEZONE'];

try {
    // Connect to MySQL server
    $pdo = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Update the timezone
    $sql = "SET time_zone = :timezone";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':timezone', $dbTimezone, PDO::PARAM_STR);
    $stmt->execute();

    echo "MySQL timezone updated to $dbTimezone.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
