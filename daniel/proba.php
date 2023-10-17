<?php

$tdee = $calorieRecommendations = $bmi = null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $age = $_POST['$age'];
    $gender = $_POST['$gender'];
    $weight = $_POST['$weight'];
    $height = $_POST['$height'];
    $activity = $_POST['$activity'];
    $body_fat= isset($_POST['$body_fat']) ? $_POST['$body_fat'] : 0;


    $tdee = calculateTDEE($age,$gender,$weight,$height,$weight,$body_fat);
    $bmi = calculateBMI($weight,$height);
    $calorieRecommendations = calculateCalorieRecommendations($tdee);
    

}


?>