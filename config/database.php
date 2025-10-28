<?php
$host = 'localhost';
$dbname = 'uth_clubs';
$username = 'root';
$password = '';

// Attempt to connect to the database. If connection fails, fall back to mock data
// so the frontend can be developed/viewed without a working DB.
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Log the error to PHP error log and use mock data for frontend
    error_log('DB connection failed: ' . $e->getMessage());
    // Ensure $pdo is set to null so pages know there's no DB connection
    $pdo = null;
    // Load mock data (contains $upcoming and $featuredClubs)
    $mock = __DIR__ . '/mock_data.php';
    if (file_exists($mock)) {
        include_once $mock;
    }
}
?>