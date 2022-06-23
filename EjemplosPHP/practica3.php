<!-- 
21-06-2022    
http://localhost:8080/CFTIC/EJEMPLOSPHP/practica3.php


COMENTAR EN VSCODE:
Windows: [CTRL] + K (Vscode queda a la espera). Después pulsa [CTRL] + C para comentar y [CTRL] + U
DAR FORMATO:
SHIFT + ALT + F
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>

<body>
    <?php
    echo "Los datos registrados son: </br></br>";

    echo "Nombre: " . $_POST["nombre"] . "</br>";
    echo "Primer Apellido: " . $_POST["apellido1"] . "</br>";
    echo "Segundo Apellido: " . $_POST["apellido2"] . "</br>";
    echo "Domicilio: " . $_POST["domicilio"] . "</br>";
    echo "Ciudad: " . $_POST["ciudad"] . "</br>";

    if (!empty($_POST['sex'])) {
        echo "Sexo: " . $_POST["sex"] . "</br>";
    } else {
        echo "Sexo: Valor no seleccionado" . "</br>";
    }

    echo "Sistema Operativo: ";
    if (isset($_POST["so"])) {
        $arraySO = $_POST["so"];
        $count = count($arraySO);

        for ($i = 0; $i < $count; $i++) {
            if ($i == ($count - 1))
                echo $arraySO[$i] . ".";
            else
                echo $arraySO[$i] . ", ";
        }
    } else {
        echo "Sin S.O.";
    }
    echo "</br>";

    echo "Comentarios: " . $_POST["comentarios"] . "</br>";


    ?>
</body>

</html>