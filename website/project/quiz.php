<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="quiz.css">
</head>
<body>
    <h2>Wat hoort tussen de []!</h2>
<?php
    $quiz = [
        [
            "vraag" => "}[ ](variabel i < 6);",
            "antwoord_een" => "for",
            "antwoord_twee" => "if",
            "antwoord_drie" => "while",
            "goede_antwoord" => "while",
            "id" => 0
        ],
        [
            "vraag" => "[](variabel i = 0; variabel i < 10;",
            "antwoord_een" => "if",
            "antwoord_twee" => "while",
            "antwoord_drie" => "for",
            "goede_antwoord" => "for",
            "id" => 1
        ],
        [
            "vraag" => "} [] (variabel a > variabel b) {",
            "antwoord_een" => "else",
            "antwoord_twee" => "if",
            "antwoord_drie" => "elseif",
            "goede_antwoord" => "elseif",
            "id" => 2
        ]
    ];

    $goed = 0;
    ?>

<div class="form-home">
<?php
    for ($i = 0; $i < count($quiz); $i++) {
    ?>
        <form method="post" action="quiz.php">
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
            <input type="submit" value="verzenden">
        </form>
</div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        for ($i = 0; $i < count($quiz); $i++) {
            if ($_POST[$i] == $quiz[$i]["goede_antwoord"]) {
                $goed += 1;
            } else {
                $id = $i + 1;
                echo "<p class='result'>Antwoord op vraag {$id} is {$quiz[$i]["goede_antwoord"]}</p>";
            }
        }
        $score = $goed / count($quiz) * 100;
        echo "Je had " . $goed . " van de " . count($quiz) . " vragen goed.<br>";
        echo "De score is " . $score . "%<br>";
        ?>
        <a href="https://www.w3schools.com/php/default.asp">Hier voor extra uitleg</a>
        
        <?php
    }

?>
</body>
</html>
