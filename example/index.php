<?php

// Unofficial Google Trends
use XFran\GTrends\GTrends;

// Debug is true if using sample JSON data, false if using data from GTrends
define('DEBUG_MODE', true);

// If using live data from GTrends
if(!DEBUG_MODE){

    // Composer autoloader
    require_once '../vendor/autoload.php';

    // Search on Google Trends for the keyword, in the suitable country and language, for the last 6 years
    $options = [
        'geo' => 'FR',
        'hl' => 'fr',
        'time' => '2020-07-01 2026-07-31', 
        'category' => 0,
        'tz' => 0,
    ];

    // Pass the options to a new GTrends request
    $gt = new GTrends($options);

    // Make the 'Interest Over Time' request with the specific keyword
    $gTrendsResponse = $gt->getInterestOverTime (['croissants']);

}

// Use to display the data in JSON format
// echo "<pre>";
// echo json_encode($gTrendsResponse, JSON_PRETTY_PRINT);
// echo "</pre>";

// If using sample JSON data
if(DEBUG_MODE){

    // Get the JSON data from the sample file
    $sampleJSONData = file_get_contents('sample-data.json');

    // Convert JSON into a PHP array
    $gTrendsResponse = json_decode($sampleJSONData, true);

    // If there is a problem with the JSON
    if (json_last_error() !== JSON_ERROR_NONE) {

        // Kill the script and show the suitable error
        die('Invalid JSON: ' . json_last_error_msg());

    }

}

// Find the months data inside the response
$trendsDataMonths = $gTrendsResponse['TIMESERIES']['data']['timelineData'];

// Create an empty array for the trend scores (only for testing)
$trendScores = [];

// Add a heading to the page
echo "<h1>Monthly Trend Scores</h1>";

// Loop through each trend data month
foreach($trendsDataMonths as $trendsDataMonth) {

    // Get the trend month - as yyyy-mm-dd
    $trendMonth = date("Y-m-d", $trendsDataMonth['time']);
    echo "date: " . $trendMonth . "<br/>";

    // Get the trend score for the month - as integer
    $trendScore = $trendsDataMonth['value'][0]; 
    echo "score: " . $trendScore . "<br/>";

    // Add the trend score to the array (only for testing)
    $trendScores[] = $trendScore;

    // Add the trend score to the array, using the month as the key (only for testing)
    // $trendScores[$trendMonth] = $trendScore;

    echo "<hr/>";
 
}

?>