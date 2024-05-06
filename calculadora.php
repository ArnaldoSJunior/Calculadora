 <?php 
    session_start();
    $resultado = null ??  "<br>";
    $resultado = $_SESSION['resultado'];
    
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
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
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                        <option value="^">^</option>
                        <option value="!">!</option>
                    </select>
                    <span class="input-group-text ms-2 rounded-start">Número 2</span>
                    <input type="text" aria-label="num2" class="form-control rounded-end" name="num2">
                    <input type="submit" name="calcular" value="Calcular" class="btn btn-outline-success ms-1 rounded">
                </div>
                <br>
                <div>
                    <input type="submit" name="salvar" value="Salvar" class="btn btn-outline-warning">
                    <input type="submit" name="pegar" value="Pegar Valore" class="btn btn-outline-secondary">
                    <input type="submit" name="m" value="M" class="btn btn-outline-info">
                    <input type="submit" name="apagar" value="Apagar Histórico" class="btn btn-outline-info">
                    <br>
                </div>

                <div>
                    <br>
                    <div id="resultado" class="p-2 bg-white text-dark h-auto fs-6 ms-2 me-2 rounded"><?= $_SESSION['resultado'] ?>
                    </div><br>
                </div>
                <div>
                    <div class="p-2 bg-white text-dark h-auto fs-6 ms-2 me-2 rounded"><b>HISTÓRICO</div><br>
                </div>
                <?php
            

            if(isset($_GET['calcular'])){
                $operacao = 1;  
            }else if(isset($_GET['salvar'])){
                $operacao = 2;
            }else if(isset($_GET['pegar'])){
                $operacao = 3;
            }else if (isset($_GET['m'])){
                $operacao = 4;
            }else if (isset( $_GET["apagar"])) {
                $operacao = 5;
            }

            function adicionar($guardar) {
                $_SESSION['historico'][] = $guardar;
            }

            function apagar() {
                $_SESSION['historico'] = array();
            }

           
            function salvar($save) {
                $_SESSION['memoria'] = $save;
            }

           
            function recuperar() {
                 return $_SESSION['memoria'];
            }

            
            function limpar() {
                 $_SESSION['memoria'] = null;
            }
            

            switch($operacao){
                case 1:
                    {
                        if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['op'])) {
                            $num1 = $_GET['num1'];
                            $num2 = $_GET['num2'];
                            $op = $_GET['op'];
                            $res = 0;
        
                            switch ($op) {
                                case '+':
                                    $res = $num1 + $num2;
                                    break;
                                case '-':
                                    $res = $num1 - $num2;
                                    break;
                                case '*':
                                    $res = $num1 * $num2;
                                    break;
                                case '/':
                                    if ($num2 != 0) {
                                        $res = $num1 / $num2;
                                    } else {
                                        $res = "Erro: Divisão por zero!";
                                    }
                                    break;
                                case '^':
                                    $res = pow($num1, $num2);
                                    break;
                                case '!':
                                    function fatorialManual($n) {
                                        $resultado = 1;
                                        for ($i = 2; $i <= $n; $i++) {
                                            $resultado *= $i;
                                        }
                                        return $resultado;
                                    }
                                    
                                    
                                    $numero = $num1;
                                    $res = fatorialManual($numero);
                                    break;
                                default:
                                    $res = "Erro: Operação inválida!";
                                    break;
                            }
                            $guardar = "$num1 $op $num2 = $res";
        
                            adicionar($guardar);
        
                            $_SESSION['resultado'] = $res;
                            $resultado = $_SESSION['resultado'];

                            echo "<script>document.getElementById('resultado').innerText = '$resultado';</script>";
                        

                            if(isset($_SESSION['historico'])) {
                                foreach ($_SESSION['historico'] as $operacao) {
                                    echo '<div class="p-2 bg-white text-dark h-auto fs-6 ms-2 me-2 rounded">' . $operacao . '</div>';
                                }
                    
                            }
        
                        }
                    }
                break;
                case 2:
                    
                    break;
                case 5:
                    apagar();
                break;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {

                
            
            }
            ?>
            </form>
        </div>
    </div>
</body>

</html>