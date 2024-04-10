<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Formulário</h2>
                <form method="POST" action="calculo.php">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
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
                        <label for="dataNasc">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="dataNasc" name="dataNasc" required>
                    </div>
                    <div class="form-group">
                        <label for="valorCompra">Valor da Compra:</label>
                        <input type="number" step="0.01" class="form-control" id="valorCompra" name="valorCompra"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="taxaJuro">Taxa de Juros (%):</label>
                        <input type="number" step="0.01" class="form-control" id="taxaJuro" name="taxaJuro" required>
                    </div>
                    <div class="form-group">
                        <label for="numParcela">Número de Parcelas:</label>
                        <input type="number" class="form-control" id="numParcela" name="numParcela" required>
                    </div>
                    <div class="form-group">
                        <label for="entrada">Entrada:</label>
                        <input type="number" step="0.01" class="form-control" id="entrada" name="entrada">
                    </div>
                    <button type="submit" class="btn btn-primary">Calcular</button>
                </form>
            </div>
        </div>

        <?php if (isset($_SESSION['total1']) && isset($_SESSION['total2']) && isset($_SESSION['total3'])): ?>
            <div class="row mt-5">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Resultados</h2>
                            <p class="card-text">Nome:
                                <?php echo ($_SESSION['name']) ?>
                            </p>
                            <p class="card-text">CPF:
                                <?php echo ($_SESSION['cpf']) ?>
                            </p>
                            <p class="card-text">E-mail:
                                <?php echo ($_SESSION['email']) ?>
                            </p>
                            <p class="card-text">Telefone:
                                <?php echo ($_SESSION['tel']) ?>
                            </p>
                            <p class="card-text">Data de Nascimento:
                                <?php echo ($_SESSION['dataNasc']) ?>
                            </p>
                            <p class="card-text">Cenário 1: R$
                                <?php echo number_format($_SESSION['total1'], 2, ',', '.'); ?>
                            </p>
                            <p class="card-text">Cenário 2: R$
                                <?php echo number_format($_SESSION['total2'], 2, ',', '.'); ?>
                            </p>
                            <p class="card-text">Cenário 3: R$
                                <?php echo number_format($_SESSION['total3'], 2, ',', '.'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>