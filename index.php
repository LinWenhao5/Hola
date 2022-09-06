<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
</body>

<?php
    $quiz = [
        [
            "vraag" => "hoeveel is een plus een?",
            "antwoord_een" => "1",
            "antwoord_twee" => "2",
            "antwoord_drie" => "3",
            "goede_antwoord" => "2",
            "id" => 0
        ],
        [
            "vraag" => "hoeveel is twee plus twee?",
            "antwoord_een" => "2",
            "antwoord_twee" => "4",
            "antwoord_drie" => "8",
            "goede_antwoord" => "4",
            "id" => 1
        ]

    ];

    $goed = 0;

    for ($i = 0; $i < count($quiz); $i++) {
    ?>
    <div class="form-home">
        <form method="post" action="index.php">
            <label for="vraag"><?php echo $quiz[$i]["vraag"] ?></label><br>
            <input type="radio" name="<?php echo $quiz[$i]["id"] ?>" value="<?php echo $quiz[$i]["antwoord_een"] ?>">
            <label for="antwoord_een"><?php echo $quiz[$i]["antwoord_een"] ?></label><br>
            <input type="radio" name="<?php echo $quiz[$i]["id"] ?>" value="<?php echo $quiz[$i]["antwoord_twee"] ?>">
            <label for="antwoord_twee"><?php echo $quiz[$i]["antwoord_twee"] ?></label><br>
            <input type="radio" name="<?php echo $quiz[$i]["id"] ?>" value="<?php echo $quiz[$i]["antwoord_drie"] ?>">
            <label for="antwoord_drie"><?php echo $quiz[$i]["antwoord_drie"] ?></label><br><br>
    <?php
    }
?>
     <div class="button-home"><input type="submit" value="verzenden"></div> 
        </form>
</div>
<?php
    for ($i = 0; $i < count($quiz); $i++) {
        if ($_POST[$i] == $quiz[$i]["goede_antwoord"]) {
            $goed += 1;
        }
    }
    $score = $goed / count($quiz) * 100;
    echo "Je had " . count($quiz) . " van de " . $goed . " vragen goed.<br>";
    echo "De score is " . $score . "%";
?>
</html>
