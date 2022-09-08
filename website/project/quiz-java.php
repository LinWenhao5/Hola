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
<a class="return_button" href="index.html">Terug</a>
<?php
    $quiz = [
        [
            "vraag" => "let length = 16;          //  Number<br>
            let lastName = Johnson;              //   String<br>
            const x = {<br>
              firstName: John,<br>
              lastName: Doe<br>
            };                                  // []
            ",
            "antwoord_een" => "let",
            "antwoord_twee" => "number",
            "antwoord_drie" => "object",
            "goede_antwoord" => "object",
            "id" => 0
        ],
        [
            "vraag" => "const person = {<br>
                firstName: John,<br>
                lastName: Doe<br>
              };<br>
              
              alert([]);",
            "antwoord_een" => "if",
            "antwoord_twee" => "const",
            "antwoord_drie" => "person.firstName",
            "goede_antwoord" => "person.firstName",
            "id" => 1
        ],
        [
            "vraag" => "let txt = Hello World!;<br>
            let x = []<br>
            txt.length;<br>
            alert(x);",
            "antwoord_een" => "length",
            "antwoord_twee" => "txt",
            "antwoord_drie" => "txt.length",
            "goede_antwoord" => "txt.length",
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
        <a href="https://www.w3schools.com/js/default.asp">Hier voor extra uitleg</a>
        <?php
    }
?>
</div>
</body>
</html>
