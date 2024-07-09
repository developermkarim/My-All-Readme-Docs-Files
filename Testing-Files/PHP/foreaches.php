<?php


// Assuming you're using PDO for database operations

// Establish database connection
$pdo = new PDO("mysql:host=localhost;dbname=frentica", "root", "");

// Prepare and execute a SELECT query
$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();

$arr_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($arr_data);
// Fetch rows using foreach loop
foreach ($arr_data as $row) {
    // Process each row
    echo $row['username'] . "<br>";
}

echo "<br>";

// Fetch users
$usersStmt = $pdo->prepare("SELECT * FROM users"); //  22
$usersStmt->execute();
$users = $usersStmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $key => $user) {
    
    $orderStmt = $pdo->prepare("SELECT * FROM orders WHERE customer_id = ?");

    $orderStmt->execute([$user['id']]);

    $user_orders = $orderStmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($user_orders as $key => $user_order) {
       
        echo $user_order['invoice_no'] . ' = ' .  $user_order['customer_id'] . '<br>' ;
    }

}


