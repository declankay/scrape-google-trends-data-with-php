<?php

// Copy and paste the suitable data transformation to the bottom of the script on index.php



// Sample Data Transformations

// ONE - Five-Year Average (Median) 

// Sort the trend scores into ascending order
sort($trendScores);

// Set the middle index by counting the months (73)
// Minus one because the index starts counting at zero, not one
// Divide by two to get the middle value
// Use floor to round down to the nearest whole number
$medianIndex = floor((count($trendScores) - 1) / 2);

// Select the middle number using the calculated index
$medianScore = $trendScores[$medianIndex];

echo $medianScore;



// TWO - Five-Year Average (Mean)

// Get the total of all the scores combined with array_sum
// Use the count function to get the total number of months
// Divide the sum of the scores by the number of months to get the average
// Wrap in number_format the average is rounded to a whole number
// $meanAverageScore = number_format(array_sum($trendScores)/count($trendScores));

echo $meanAverageScore;



// THREE - Highest, Lowest and Range Scores

// Use the min function to return the smallest score in the list
$lowestScore = min($trendScores);

// Use the max function to return the highest score in the list
$highestScore = max($trendScores);

// Get the range between the two values by deducting the highest score minus the lowest score
$rangeScore = $highestScore - $lowestScore;

echo $rangeScore;



// FOUR - Months Above a Specific Score

// Amend the trend scores inside the for each loop used previously
// Add the trend score to the array, using the month as the key (only for testing)
$trendScores[$trendMonth] = $trendScore;

// Use array_filter to select specific values out from the array
// Set the first parameter to the array of trend scores
// Set the second parameter to an anonymous function, which allows the list of months / scores to be looped through
// Assign a new variable for above a specific score months as a parameter in the function
// Use return to collect the scores / months above a number - in this case the mean of 68
$aboveSpecificScores = array_filter($trendScores, function($aboveSpecificScore){

    return $aboveSpecificScore >= 68;

});

// Use count to display the number of months above the mean score
echo "the number of months above the mean: " . count($aboveSpecificScores) . "<br/>";

// Loop through the months above the mean
// Add a double arrow to display the key and the value (month and score)
foreach ($aboveSpecificScores as $aboveSpecificScoreMonth => $aboveSpecificScore) {

    echo $aboveSpecificScoreMonth . " " . $aboveSpecificScore . "<br/>";

}



// FIVE - Highest, Lowest and Range Scores

// Amend the trend scores inside the for each loop used previously
// Add the trend score to the array, using the month as the key (only for testing)
$trendScores[$trendMonth] = $trendScore;

// Use the arsort function to place the scores in descending order and preserve the array keys (name of the month)
arsort($trendScores);

// Use array_slice to get part of the array
// Use 0 and then 5 to get the top five scores
// Set the last parameter to true to preserve the key (suitable month)
$topFiveMonthScores = array_slice($trendScores, 0, 5, true);

// Loop through the top five month scores
// Add a double arrow to display the key and the value (month and score)
foreach ($topFiveMonthScores as $topFiveMonth => $topFiveScore) {

    echo $topFiveMonth . " " . $topFiveScore . "<br/>";

}



?>