<!-- 
21-06-2022    
http://localhost:8080/EJEMPLOSPHP/practica4.php
-->

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
</head>

<body bgcolor=" <?php echo $_GET['colors'] ?>">
    <?php

    $fondo = $_GET['colors'];
    $letra = $_GET['font'];
    $texto = $_GET['texto'];

    ?>

    <!--
        Ver código fuente en el navegador para ver lo que está llegando:
        Sin el echo lo procesaría pero no te lo muestra, no se lo devuelve al cliente
     -->

    <pre style="background-color: <?php echo $fondo ?>; 
              font-family: <?php echo $letra ?>;
              font-size: 4em;
              text-align: center;
              padding-top: 100px;">
              
        <?php echo $texto; ?> </br>
    </pre>
    

    
</body>

</html>
