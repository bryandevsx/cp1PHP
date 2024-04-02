<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dadoPessoal = array(
        'nome' => $_POST['nome'],
        'cpf' => $_POST['cpf'],
        'email' => $_POST['email'],
        'tel' => $_POST['tel'],
        'dataNasc' => $_POST['dataNasc']
    );

    $dadoFinanc = array(
        'valorCompra' => $_POST['valorCompra'],
        'juros' => $_POST['juros'],
        'numeroParc' => $_POST['numeroParc'],
        'valorEnt' => $_POST['valorEnt']
    );

    $taxaJuros = $dadoFinanc['juros']; // Corrigindo a referência para a taxa de juros

    $simulacao = array(
        'dadoPessoal' => $dadoPessoal,
        'dadoFinanc' => $dadoFinanc,
        'valorParc' => parcCalculo($dadoFinanc['valorCompra'], 
            $taxaJuros, $dadoFinanc['numeroParc'], $dadoFinanc['valorEnt']),
        'totalFinanc' => financCalculo($dadoFinanc['valorCompra'], $taxaJuros, $dadoFinanc['numeroParc'], 
            $dadoFinanc['valorEnt'])
    );

    if (!isset($_SESSION['simulacao'])) {
        $_SESSION['simulacao'] = array();
    }
    $_SESSION['simulacao'][] = $simulacao;
}

// Função para calcular o valor de cada parcela
function parcCalculo($valorCompra, $taxaJuros, $numeroParc, $valorEnt) {
    if ($numeroParc != 0 && $taxaJuros != 0) { // Verifica se o número de parcelas e a taxa de juros são diferentes de zero
        $taxaJuros = $taxaJuros / 100; // Converte a taxa de juros para decimal
        $valorCompra -= $valorEnt; // Subtrai o valor da entrada do valor total

        // Calcula o valor das parcelas usando a fórmula de amortização de empréstimos
        $parcela = ($valorCompra * $taxaJuros) / (1 - pow(1 + $taxaJuros, -$numeroParc));

        return $parcela;
    } else {
        return 0; // Retorna 0 se o número de parcelas for zero ou a taxa de juros for zero para evitar divisão por zero
    }
}

// Função para calcular o total do financiamento
function financCalculo($valorCompra, $taxaJuros, $numeroParc, $valorEnt) {
    $valorParc = parcCalculo($valorCompra, $taxaJuros, $numeroParc, $valorEnt); // Calcula o valor de cada parcela
    $total_financiamento = $valorParc * $numeroParc + $valorEnt; // Calcula o total do financiamento

    return $total_financiamento;
}
?>