<?php
require_once "DAO.php";

$db = new DAO();

// Get all messages
$messages = $db->getData();
echo "num username message\n";
foreach ($messages as $message) {
        echo $message["id"] . " " . $message["username"] . " " . $message["message"] . "\n";
}

// Test the new methods
echo "\nTesting new methods:\n";

// Insert a new message using prepared statement
$db->execute("INSERT INTO messages (username, message) VALUES (:username, :message)", [
        ':username' => 'test_user',
        ':message' => 'This is a test message using prepared statements'
]);

// Get all messages again to see the new one
$messages = $db->getData();
echo "\nAfter insert:\n";
foreach ($messages as $message) {
        echo $message["id"] . " " . $message["username"] . " " . $message["message"] . "\n";
}