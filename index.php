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
            "vraag" => "Who invented JavaScript?",
            "antwoord_een" => "Douglas Crockford",
            "antwoord_twee" => "Sheryl Sandberg",
            "antwoord_drie" => "Brendan Eich",
            "goede_antwoord" => "Brendan Eich",
            "id" => 0
        ],
        [
            "vraag" => "Which one of these is a JavaScript package manager?",
            "antwoord_een" => "Node.js",
            "antwoord_twee" => "TypeScript",
            "antwoord_drie" => "npm",
            "goede_antwoord" => "npm",
            "id" => 1
        ],
        [
            "vraag" => "Which tool can you use to ensure code quality?",
            "antwoord_een" => "Angular",
            "antwoord_twee" => "ESLint",
            "antwoord_drie" => "RequireJS",
            "goede_antwoord" => "ESLint",
            "id" => 2
        ],

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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        for ($i = 0; $i < count($quiz); $i++) {
            if ($_POST[$i] == $quiz[$i]["goede_antwoord"]) {
                $goed += 1;
            }
        }
        $score = $goed / count($quiz) * 100;
        echo "Je had " . count($quiz) . " van de " . $goed . " vragen goed.<br>";
        echo "De score is " . $score . "%";
    }

?>
</html>
