<?php
require_once("../data/config.php");

$msgg = $_POST['input'];
$msg = strtolower($msgg);
$length = strlen($msg);
$flag = 0;

$sql = "SELECT * FROM preguntas_frecuentes WHERE pregunta LIKE '$msg%'";
$send = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<style>
    .in {
        background-color: rgb(64, 128, 255);
        color: white;
        padding: 10px;
        right: 0;
        width: 130px;
        text-align: center;
        height: auto;
        border-radius: 5px;
        margin-left: 120px;
        margin-bottom: 5px;
    }

    .out {
        background-color: rgb(241, 240, 240);
        color: black;
        padding: 10px;
        left: 5;
        width: 130px;
        text-align: center;
        height: auto;
        border-radius: 15px;
    }
</style>

<body>
    <div class="in">
        <?php echo "$msgg"; ?>
    </div><br>
    <div class="out">
        <?php
        function make_links_clickable($text)
        {
            return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<br><a href="$1" target="_blank">Click Here</a><br>', $text);
        }

        while ($row = mysqli_fetch_array($send)) {
            $flag = 1;
            $output = $row['respuesta'];
            $title = isset($row['title']) ? $row['title'] : '';

            $result = make_links_clickable($output);

            if (!empty($title)) {
                echo "<div style=\"margin-top:10px; margin-bottom:5px;background-color:blue;color:white;\"><b>$title</b></div>";
            }

            echo "$result";
        }

        if ($flag == 0) {
            $output = "Lo siento, no tengo conocimiento de " . $msgg . " todavía. Escribe solo una palabra clave sin espacios en lugar de una oración completa. Para ayuda de emergencia, llama al: 01757687942";
            $result = make_links_clickable($output);
            echo "$result";
        }
        ?>
    </div><br>
</body>
</html>
