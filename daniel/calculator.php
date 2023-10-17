<?php
require 'includes/functions.php';

$tdee = $bmi = $calorieRecommendations = null;  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $activity = $_POST['activity'];
    $bodyFat = isset($_POST['body_fat']) ? $_POST['body_fat'] : 0;


    $tdee = calculateTDEE($age, $gender, $weight, $height, $activity, $bodyFat);
    $bmi = calculateBMI($weight, $height);
    $calorieRecommendations = calculateCalorieRecommendations($tdee);


}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Calorie Calculator</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
<div class="pozdrav">
        <h1>Dobro došli!</h1>
        <p>Otkrijte svoju polazišnu točku! Koliko žderati ako se bulkam? Koliko gladovati ako radim defku? <br>Saznaj ispod!</p>
    </div>

    <div class="container">
        <h1>Kalkulator unosa kalorija</h1>
        <form action="calculator.php" method="post">
            <label>Spol:</label>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Muško</label>
            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Žensko</label><br>

            <label for="age">Dob:</label>
            <input type="number" id="age" name="age" required><br>

            <label for="weight">Težina (kg):</label>
            <input type="number" id="weight" name="weight" required><br>

            <label for="height">Visina (cm):</label>
            <input type="number" id="height" name="height" required><br>

            <label for="activity">Razina aktivnosti:</label>
            <select id="activity" name="activity" required>
                <option value="sedentary">Sjedilački način života(rijetka aktivnost)</option>
                <option value="lightly_active">Lagani trening (1-2 puta tjedno)</option>
                <option value="moderately_active">Srednji trening (3-4 puta tjedno)</option>
                <option value="very_active">Jaki trening (5-7 puta tjedno)</option>
                <option value="super_active">Sprotaški trening (8-14 puta tjedno)</option>
            </select><br>

            <label for="body_fat">Body Fat (neobavezno):</label>
            <input type="number" id="body_fat" name="body_fat"><br>

            <button type="submit">Izračunaj</button>
        </form>
        <div id="result-box">
            <p>Vaš TDEE je <?php echo $tdee ?? '0'; ?> kalorija dnevno.</p>
            <p>Vaš BMI je <?php echo $bmi ?? '0'; ?>.</p>
            <p>Da bi izgubili 1 kg tjedno, jedite <?php echo isset($calorieRecommendations['lose1Kg']) ? $calorieRecommendations['lose1Kg'] : '0'; ?> kalorija dnevno.</p>
            <p>Da bi izgubili 0.5 kg tjedno, jedite <?php echo isset($calorieRecommendations['lose0_5Kg']) ? $calorieRecommendations['lose0_5Kg'] : '0'; ?> kalorija dnevno.</p>
            <p>Da bi održali težinu, jedite <?php echo isset($calorieRecommendations['maintain']) ? $calorieRecommendations['maintain'] : '0'; ?> kalorija dnevno.</p>
            <p>Da bi dobili 0.5 kg tjedno, jedite <?php echo isset($calorieRecommendations['gain0_5Kg']) ? $calorieRecommendations['gain0_5Kg'] : '0'; ?> kalorija dnevno.</p>
            <p>Da bi dobili 1 kg tjedno, jedite <?php echo isset($calorieRecommendations['gain1Kg']) ? $calorieRecommendations['gain1Kg'] : '0'; ?> kalorija dnevno.</p>
        </div>
    </div>
</body>
</html>
