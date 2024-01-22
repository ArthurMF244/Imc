<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
</head>
<body>

<?php
// Função para calcular o IMC
function calcularIMC($peso, $altura) {
    // Verifica se a altura é diferente de zero para evitar divisão por zero
    if ($altura != 0) {
        // Calcula o IMC
        $imc = $peso / ($altura * $altura);
        return $imc;
    } else {
        // Retorna -1 para indicar que a altura é zero
        return -1;
    }
}

// Função para exibir a situação de acordo com o IMC
function exibirSituacao($imc) {
    if ($imc == -1) {
        echo "Altura inválida. Não é possível calcular o IMC.";
    } else {
        echo "Seu IMC é: " . number_format($imc, 2);

        // Classificação do IMC
        if ($imc < 18.5) {
            echo "<br>Situação: Abaixo do peso";
        } elseif ($imc >= 18.5 && $imc < 24.9) {
            echo "<br>Situação: Peso normal";
        } elseif ($imc >= 25 && $imc < 29.9) {
            echo "<br>Situação: Sobrepeso";
        } elseif ($imc >= 30 && $imc < 34.9) {
            echo "<br>Situação: Obesidade Grau I";
        } elseif ($imc >= 35 && $imc < 39.9) {
            echo "<br>Situação: Obesidade Grau II";
        } else {
            echo "<br>Situação: Obesidade Grau III";
        }
    }
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores do formulário
    $peso = isset($_POST["peso"]) ? $_POST["peso"] : 0;
    $altura = isset($_POST["altura"]) ? $_POST["altura"] : 0;

    // Calcula o IMC
    $resultadoIMC = calcularIMC($peso, $altura);

    // Exibe a situação
    exibirSituacao($resultadoIMC);
}
?>

<!-- Formulário para inserir os dados -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Peso (kg): <input type="text" name="peso"><br>
    Altura (m): <input type="text" name="altura"><br>
    <input type="submit" value="Calcular">
</form>

</body>
</html>
