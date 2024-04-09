<?php
    session_start();

    function calculoCF($taxaJuro, $numParcela) {
        return ($taxaJuro * pow((1 + $taxaJuro), $numParcela)) / (pow((1 + $taxaJuro), $numParcela) - 1);
    }

    function calculoCenario1($valorCompra, $CF, $numParcela) {
        $PMT = $valorCompra * $CF;
        return $PMT * $numParcela;
    }

    function calculoCenario2($valorCompra, $CF, $numParcela, $entrada) {
        $PV = $valorCompra - $entrada;
        $PMT = $PV * $CF; 
        return $entrada + ($PMT * $numParcela); 
    }

    function calculoCenario3($valorCompra, $CF, $numParcela) {
        $PMT = ($valorCompra * $CF) / (1 + $CF); 
        return $PMT * $numParcela; 
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $dataNasc = $_POST['dataNasc'];
        
        $valorCompra = $_POST['valorCompra'];
        $taxaJuro = $_POST['taxaJuro'];
        $numParcela = $_POST['numParcela'];
        $entrada = isset($_POST['entrada']) ? $_POST['entrada'] : 0;

        $CF = calculoCF($taxaJuro, $numParcela);

        $_SESSION['name'] = $name;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['email'] = $email;
        $_SESSION['tel'] = $tel;
        $_SESSION['dataNasc'] = $dataNasc;
        $_SESSION['total1'] = calculoCenario1($valorCompra, $CF, $numParcela);
        $_SESSION['total2'] = calculoCenario2($valorCompra, $CF, $numParcela, $entrada);
        $_SESSION['total3'] = calculoCenario3($valorCompra, $CF, $numParcela);

        header("Location: index.php");
        exit();
    }
?>