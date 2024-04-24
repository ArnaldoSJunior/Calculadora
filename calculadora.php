<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
    </style>
</head>
<body>
<div class="position-absolute top-50 start-50 translate-middle ">
    <div class="text-bg-dark p-3 rounded mx-auto">
        <h1 class="display-6 text-center">Calculadora PHP</h1>
        <form action="" method="GET">
            <div class="input-group mx-auto p-2">
                <span class="input-group-text">Número 1</span>
                <input type="text" aria-label="num1" class="form-control rounded-end" name="num1">
                <span class="input-group-text ms-2 rounded-start">-</span>
                <select class="form-select rounded-end" aria-label="Default select example" name="op">
                    <option selected></option>
                    <option value="1">+</option>
                    <option value="2">-</option>
                    <option value="3">*</option>
                    <option value="4">/</option>
                    <option value="5">^</option>
                    <option value="6">!</option>
                </select>
                <span class="input-group-text ms-2 rounded-start">Número 2</span>
                <input type="text" aria-label="num2" class="form-control rounded-end" name="num2">
                <input type="submit" value="Calcular" class="btn btn-outline-success ms-1 rounded">
            </div>
            <?php
            if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['op'])) {
                $num1 = $_GET['num1'];
                $num2 = $_GET['num2'];
                $op = $_GET['op'];
                $res = 0;

                switch ($op) {
                    case '1':
                        $res = $num1 + $num2;
                        break;
                    case '2':
                        $res = $num1 - $num2;
                        break;
                    case '3':
                        $res = $num1 * $num2;
                        break;
                    case '4':
                        if ($num2 != 0) {
                            $res = $num1 / $num2;
                        } else {
                            $res = "Erro: Divisão por zero!";
                        }
                        break;
                    case '5':
                        $res = pow($num1, $num2);
                        break;
                    case '6':
                        function fatorialManual($n) {
                            $resultado = 1;
                            for ($i = 2; $i <= $n; $i++) {
                                $resultado *= $i;
                            }
                            return $resultado;
                        }
                        
                        // Exemplo de uso:
                        $numero = $num1;
                        $res = fatorialManual($numero);
                        break;
                    default:
                        $res = "Erro: Operação inválida!";
                        break;
                }
                echo '<div class="p-2 bg-white text-dark h-auto fs-6 ms-2 me-2 rounded">' . $res . '</div>';
            }
            ?>
        </form>
    </div>
</div>   
</body>
</html>