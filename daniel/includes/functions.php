
<?php

function calculateTDEE($age, $gender, $weight, $height, $activity, $body_fat = 0) {
    $activityMultipliers = [
        'sedentary' => 1.2,          
        'lightly_active' => 1.375, 
        'moderately_active' => 1.55,
        'very_active' => 1.725,     
        'super_active' => 1.9       
    ];

    if ($gender === 'male') {
        $bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
    } elseif ($gender === 'female') {
        $bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
    } else {
        return 'Invalid gender';
    }

    $tdee = round($bmr * $activityMultipliers[$activity]);

    if ($body_fat > 0) {
    }

    return $tdee;
}


function calculateBMI($weight, $height) {
    $heightInMeters = $height / 100;
    $bmi = $weight / ($heightInMeters * $heightInMeters);
    
    if ($bmi < 18.5) {
        return "Pothranjen";
    } elseif ($bmi >= 18.5 && $bmi < 24.9) {
        return "Zdrav";
    } elseif ($bmi >= 25.0 && $bmi < 29.9) {
        return "Debljina";
    } else {
        return "Morbidna debljina";
    }
}

function calculateCalorieRecommendations($tdee) {
    $caloriesToLose1Kg = round($tdee - 1000);   
    $caloriesToLose0_5Kg = round($tdee - 500); 
    $caloriesToMaintain = $tdee;              
    $caloriesToGain0_5Kg = round($tdee + 500); 
    $caloriesToGain1Kg = round($tdee + 1000); 
    
    return [
        'lose1Kg' => $caloriesToLose1Kg,
        'lose0_5Kg' => $caloriesToLose0_5Kg,
        'maintain' => $caloriesToMaintain,
        'gain0_5Kg' => $caloriesToGain0_5Kg,
        'gain1Kg' => $caloriesToGain1Kg
    ];
}


?>
