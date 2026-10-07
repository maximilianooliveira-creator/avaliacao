<?php

session_start();

if (!isset($_SESSION['valores'])) {
    $_SESSION['valores'] = [];
}

if (isset($_POST['calcular'])) {

    $altura = $_POST['altura'];
    $comprimento = $_POST['comprimento'];

    $area = $altura * $comprimento;

    if ($altura == $comprimento) {
        $forma = "Quadrado";
    } elseif ($altura > $comprimento) {
        $forma = "Retângulo Vertical";
    } else {
        $forma = "Retângulo Horizontal";
    }

    $_SESSION['valores'][] = [
        "altura" => $altura,
        "comprimento" => $comprimento,
        "forma" => $forma,
        "area" => $area
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valores Geométricos</title>
</head>
<body>
    
<h2>Calcular Área</h2>

    <form method="POST">

        <label>Altura:</label>
        <input type="number" name="altura" required>

        <br><br>

        <label>Comprimento:</label>
        <input type="number" name="comprimento" required>

        <br><br>

        <button type="submit" name="calcular">Calcular</button>

    </form>

    <br>

    <form method="POST">
        <button type="submit" name="listar">Listar armazenados</button>
    </form>

    <?php

    if (isset($_POST['listar'])) {

        echo "<h2>Valores armazenados</h2>";

        foreach ($_SESSION['valores'] as $dado) {

            echo "Altura: " . $dado['altura'] . "<br>";
            echo "Comprimento: " . $dado['comprimento'] . "<br>";
            echo "Forma: " . $dado['forma'] . "<br>";
            echo "Área: " . $dado['area'] . "<br>";

            echo "<hr>";
        }
    }

    ?>

</body>
</html>