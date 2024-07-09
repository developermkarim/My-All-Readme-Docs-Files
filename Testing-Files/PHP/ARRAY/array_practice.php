<?php


// Simulating database records for users and activities
$users = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
    ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
];

$activities = [
    ['user_id' => 1, 'type' => 'login', 'timestamp' => '2023-05-15 08:00:00'],
    ['user_id' => 1, 'type' => 'view', 'timestamp' => '2023-05-15 08:15:00'],
    ['user_id' => 1, 'type' => 'logout', 'timestamp' => '2023-05-15 08:30:00'],
    ['user_id' => 2, 'type' => 'login', 'timestamp' => '2023-05-15 09:00:00'],
    ['user_id' => 2, 'type' => 'view', 'timestamp' => '2023-05-15 09:05:00'],
    ['user_id' => 2, 'type' => 'view', 'timestamp' => '2023-05-15 09:10:00'],
    ['user_id' => 2, 'type' => 'logout', 'timestamp' => '2023-05-15 09:20:00'],
];

 // echo $activities[0]['type'] // login 

function getUserActivities($userId, $activities) {
    return array_filter($activities, function($activity) use ($userId) {
        return $activity['user_id'] == $userId;
    });
}

// Prepare data for output
$userData = [];

foreach ($users as $user) {
    $activityCount = 0;
    $activitySummary = [];
    
    // Fetch activities for the current user
    $userActivities = getUserActivities($user['id'], $activities);
    
    foreach ($userActivities as $activity) {
        $activityCount++;
        
        if (!isset($activitySummary[$activity['type']])) {
            $activitySummary[$activity['type']] = 0;
        }
        
        $activitySummary[$activity['type']]++;
    }
    
    $userData[] = [
        'user_id' => $user['id'],
        'user_name' => $user['name'],
        'email' => $user['email'],
        'total_activities' => $activityCount,
        'activity_summary' => $activitySummary,
    ];
}

// Output the prepared data (for example, JSON encoding for an API response)
header('Content-Type: application/json');
echo json_encode($userData, JSON_PRETTY_PRINT);

$customerData = [];
$numberData = 0;
$stringData = '';


$customerData[]= ['test'=>1,'result'=>2]; // 

$numberData += 45;

$stringData .= 'test data';
