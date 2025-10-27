<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dia = 7;
    switch ($dia) {
        case 1:
            echo "segunda-feira!";
            break;
        case 2:
            echo "terça-feira!";
            break;
        case 3:
            echo "quarta-feira!";
            break;
        case 4:
            echo "quinta-feira!";
            break;
        case 5:
            echo "sexta-feira!";
            break;
        case 6;
            echo "sabado";
            break;
        case 7;
            echo "domingo";
            break
        default:
            echo "erro 1582349l!, nao sei que dia é esse amigo!";
    }
    ?>
</body>
</html>