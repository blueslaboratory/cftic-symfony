<!-- 
20-06-2022    
http://localhost:8080/EJEMPLOSPHP/ejemplo1.php
-->

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
</head>

<body>
    <?php

        $tipo1 = "Desarrollador de aplicaciones";
        $tipo2 = "Desarrollador web";

        echo "Trabajos: $tipo1 | " . $tipo2 . "</br>";
        echo 'Trabajos: $tipo1 | ' . $tipo2 . '</br>';
    ?>

    <!--
        Variable global POST que me recoge lo del name 
     -->

    
    Hola <?php echo $_POST['nombre']; ?>
    Usted tiene <?php echo $_POST['edad']; ?>
    años de edad, aparenta muchísimos menos.

    
</body>
</html>