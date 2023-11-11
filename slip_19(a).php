<?php
// File to store the access count
$accessCountFile = 'access_count.txt';

// Initialize the access count
$accessCount = 0;

// Check if the access count file exists
if (file_exists($accessCountFile)) {
    // Read the current count from the file
    $accessCount = (int) file_get_contents($accessCountFile);
}

// Increment the access count
$accessCount++;

// Update the count in the file
file_put_contents($accessCountFile, $accessCount);

// Display the access count
echo "This page has been accessed $accessCount times.";
?>
