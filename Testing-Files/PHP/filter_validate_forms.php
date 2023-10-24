<?php

$input_data = array(
    "email" => "invalid_email@com",
    "url" => "https://www.example.com",
    "ip" => "192.168.1.1",
    "integer" => "42",
    "float" => "3.14",
    "boolean" => "true",
    "regexp" => "123abc"
);

foreach ($input_data as $key => $value) {
    $filter = false;

    switch ($key) {
        case "email":
            $filter = FILTER_VALIDATE_EMAIL;
            break;
        case "url":
            $filter = FILTER_VALIDATE_URL;
            break;
        case "ip":
            $filter = FILTER_VALIDATE_IP;
            break;
        case "integer":
            $filter = FILTER_VALIDATE_INT;
            break;
        case "float":
            $filter = FILTER_VALIDATE_FLOAT;
            break;
        case "boolean":
            $filter = FILTER_VALIDATE_BOOLEAN;
            break;
        case "regexp":
            $regexp_pattern = "/^\d+$/"; // Regular expression pattern
            $filter = filter_var($value, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $regexp_pattern)));
            break;
    }

    if ($filter !== false) {
        echo "Input for $key is valid : $value\n"; echo "<br>";
    } else {
        echo "Input for $key is not valid : $value\n";
    }
}
