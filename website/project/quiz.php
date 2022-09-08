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
    <a class="read_more" href="index.html">Terug</a>
<?php
    $quiz = [
        [
            "vraag" => "variabel i = 1;<br> 
            [] (variabel i < 6) {<br>
            echo variabel i;<br>
              variabel i++;<br>
            }",
            "antwoord_een" => "for",
            "antwoord_twee" => "if",
            "antwoord_drie" => "while",
            "goede_antwoord" => "while",
            "id" => 0
        ],
        [
            "vraag" => "[] (variabel i = 0; variabel i < 10; variabel i++) {<br>
              echo variabel i;<br>
            }",
            "antwoord_een" => "if",
            "antwoord_twee" => "while",
            "antwoord_drie" => "for",
            "goede_antwoord" => "for",
            "id" => 1
        ],
        [
            "vraag" => "variabel a = 50;<br>
            variabel b = 10;<br>
            [] (variabel a > variabel b) {<br>
              echo Hello World;<br>
            }",
            "antwoord_een" => "else",
            "antwoord_twee" => "elseif",
            "antwoord_drie" => "if",
            "goede_antwoord" => "if",
            "id" => 2
        ]
    ];

    $goed = 0;
    ?>

<div class="form-home">
    <form method="post" action="quiz.php">
        <label for="title"><h2>Wat hoort tussen de []!</h2></label>
<?php
    for ($i = 0; $i < count($quiz); $i++) {
    ?>
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

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
        for ($i = 0; $i < count($quiz); $i++) {
            if ($_POST[$i] == $quiz[$i]["goede_antwoord"]) {
                $goed += 1;
            } else {
                $id = $i + 1;
                echo "<p>Vraag {$id}: Uw antwoord is <a class='red'>{$_POST[$i]}</a> en het juiste antwoord is <a class='green'>{$quiz[$i]["goede_antwoord"]}</a>.</p>";
            }
        }
        $score = $goed / count($quiz) * 100;
        $score = round($score);
        echo "Je had " . $goed . " van de " . count($quiz) . " vragen goed.<br>";
        echo "De score is " . $score . "%<br>";
        ?>
        <a href="https://www.w3schools.com/php/default.asp">Hier voor extra uitleg</a>
        <?php
    }
?>
</div>
</body>
</html>
