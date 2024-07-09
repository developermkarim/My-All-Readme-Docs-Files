<?php



// Creating an indexed array
$colors = array("Red", "Green", "Blue");

// Accessing elements
echo $colors[0]; // Outputs: Red
echo $colors[1]; // Outputs: Green

// Adding elements
$colors[] = "Yellow"; // Adds "Yellow" at the end of the array

// Modifying elements
$colors[1] = "Orange"; // Modifies the element at index 1 to "Orange"

// Removing elements
//unset($colors); // Removes the element at index 2
echo "<br>";

print_r($colors);
