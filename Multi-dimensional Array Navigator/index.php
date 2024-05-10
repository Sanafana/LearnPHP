<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
<?php 
$organization = [
    'Human Resources' => [
        'Recruiting Team' => [
            ['name' => 'Alice', 'role' => 'Recruiter'],
            ['name' => 'Bob', 'role' => 'Coordinator']
        ],
        'Employee Relations' => [
            ['name' => 'Charlie', 'role' => 'Manager'],
            ['name' => 'David', 'role' => 'Assistant']
        ]
    ],
    'IT Department' => [
        'Support Team' => [
            ['name' => 'Eve', 'role' => 'Technician'],
            ['name' => 'Frank', 'role' => 'Support Engineer']
        ],
        'Development Team' => [
            ['name' => 'Grace', 'role' => 'Developer'],
            ['name' => 'Hannah', 'role' => 'Tester']
        ]
    ]
];


function displayArray($array, $depth = 0) {
    echo '<pre>';  // Start the preformatted text block
    displayArrayHelper($array, $depth);
    echo '</pre>'; // End the preformatted text block
}

function displayArrayHelper($array, $depth = 0) {
    foreach ($array as $key => $value) {
        $indent = str_repeat("&nbsp;", $depth * 4);  // Create indentation
        if (is_array($value)) {
            echo $indent . htmlspecialchars($key) . ":\n";
            displayArrayHelper($value, $depth + 1);
        } else {
            echo $indent . htmlspecialchars($key) . ": " . htmlspecialchars($value) . "\n";
        }
    }
}

displayArray($organization);


?>

</body>

</html>