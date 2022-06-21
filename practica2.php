<!-- 
21-06-2022    
http://localhost:8080/EJEMPLOSPHP/practica2.php


COMENTAR EN VSCODE:
Windows: [CTRL] + K (Vscode queda a la espera). Después pulsa [CTRL] + C para comentar y [CTRL] + U
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if (isset($_POST["fruta"])) {
        $arrayFrutas = $_POST["fruta"]; 
        $count = count($arrayFrutas);

        for ($i = 0; $i < $count; $i++) {
            echo "<div style='background-color:fuchsia'>";
            echo "Elementos seleccionados $i: " . $arrayFrutas[$i] . "</div>";
        }
    } else {
        echo "SIN SELECCIÓN";
    }

    ?>
</body>

</html>