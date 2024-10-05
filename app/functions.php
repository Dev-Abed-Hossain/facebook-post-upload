<?php


/**
 * ALert message function
 */
function req_alert($msg, $type = "danger")
{
    return "<p class=\"alert alert-{$type} d-flex justify-content-between\">{$msg}<button class=\"btn btn-close\" data-bs-dismiss=\"alert\"></button></p>";
}

/**
 * Data Collect Function
 */
function old($field_name)
{
    return $_POST[$field_name];
};

/**
 * Form Reset FUnction
 */
function reset_frm()
{
    return $_POST = [];
};


/**
 * File Upload Function
 */
function move(array $file, $path = "media")
{

    // File Upload
    $tmp_name = $file["tmp_name"];
    $file_name = $file["name"];

    // Get File Extention
    $file_arr = explode(".", $file_name);
    $file_ext = strtolower(end($file_arr));

    // File Unique Name
    $unique_filename = time() . "_" . rand(100000, 10000000) . "_" . str_shuffle(123456) . "." . $file_ext;

    // File Upload
    move_uploaded_file($tmp_name, $path . $unique_filename);

    return $unique_filename;
}

/**
 * Post ID Generate Function
 */

function postId()
{
    // Generate a unique ID based on the current time in microseconds, prefixed by 'user_'
    $uniqueId = 'user_' . uniqid('', true);

    // Optionally, add a random component for extra uniqueness
    $randomNumber = mt_rand(1000, 9999); // Generate a random 4-digit number

    // Combine unique ID with random number
    $userId = $uniqueId . '_' . $randomNumber;

    return $userId;
}


/**
 * Timge ago function
 */
function timeAgo($timestamp)
{
    // Get the current time and calculate the time difference in seconds
    $timeNow = time();
    $timeDifference = $timeNow - $timestamp; // No need for strtotime()

    // Check if the timestamp is in the future
    if ($timeDifference < 0) {
        return 'Just now';
    }

    // Define time periods in seconds
    $timePeriods = array(
        'year'   => 31556926, // 365.24 days
        'month'  => 2629743,  // Approx. 30.44 days
        'w'   => 604800,   // 7 days
        'd'    => 86400,    // 24 hours
        'h'   => 3600,     // 60 minutes
        'm' => 60,       // 60 seconds
        's' => 1         // 1 second
    );

    // Loop through each time period and calculate the difference
    foreach ($timePeriods as $period => $seconds) {
        if ($timeDifference >= $seconds) {
            $periodValue = floor($timeDifference / $seconds);

            // Return the time ago string, with proper pluralization
            return $periodValue . $period . ' ago';
        }
    }

    // Return 'Just now' if the time difference is less than 1 second
    return 'Just now';
}
