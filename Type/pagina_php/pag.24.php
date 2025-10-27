<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>if and else</title>
</head>

<body>
<?php
$hora = 16;
if ($hora < "12") {
        echo "Bom Dia!";
} elseif ($hora < "18") {
        echo "Boa Tarde!";

}
else {
        echo "Boa Noite!";
}   
?>
</body>
</html>