<?php
session_start();
require_once ('formProc.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
<div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
 
            <div class="container">
                <h1>Faça sua simulação aqui:</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="tel">Telefone:</label>
                        <input type="tel" class="form-control" id="tel" name="tel" required>
                    </div>
                    <div class="form-group">
                        <label for="dataNasc">Data de nascimento:</label>
                        <input type="date" class="form-control" id="dataNasc" name="dataNasc" required>
                    </div>
                    <div class="form-group">
                        <label for="valorCompra">Valor da compra:</label>
                        <input type="number" class="form-control" id="valorCompra" name="valorCompra" required>
                    </div>
                    <div class="form-group">
                        <label for="taxaJuros">Taxa de juros:</label>
                        <input type="number" class="form-control" id="taxaJuros" name="juros" required>
                    </div>
                    <div class="form-group">
                        <label for="numeroParc">Número de parcelas:</label>
                        <input type="number" class="form-control" id="numeroParc" name="numeroParc" required>
                    </div>
                    <div class="form-group">
                        <label for="valorEnt">Valor de entrada:</label>
                        <input type="number" class="form-control" id="valorEnt" name="valorEnt" required>
                    </div>
                    <button type="submit" class="btn btn-secondary" >Simular</button>
                </form>

                <?php if (isset($_SESSION['simulacao'])): ?>
                    <h2>Resultado da sua simulação:</h2>
                    <div class="row">
                        <?php foreach ($_SESSION['simulacao'] as $simulacao): ?>
                            <div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo $simulacao['dadoPessoal']['nome']; ?>
                                        </h5>
                                        <p class="card-text">
                                            Valor de cada parcela: R$
                                            <?php echo number_format($simulacao['valorParc'], 2, ',', '.'); ?><br>
                                            Total do seu financiamento: R$
                                            <?php echo number_format($simulacao['totalFinanc'], 2, ',', '.'); ?><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js"></script>
        </div>
    </body>

</html>