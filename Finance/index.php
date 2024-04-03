<?php
    session_start();
    require_once ('formProc.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Financiamento</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Simulador de Financiamento</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="row">
            <div class="col-md-6">
                <h3>Dados Pessoais</h3>
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
                    <label for="dataNasc">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="dataNasc" name="dataNasc" required>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Dados Financeiros</h3>
                <div class="form-group">
                    <label for="valorCompra">Valor da Compra:</label>
                    <input type="number" class="form-control" id="valorCompra" name="valorCompra" required>
                </div>
                <div class="form-group">
                    <label for="juros">Taxa de Juros (%):</label>
                    <input type="number" class="form-control" id="juros" name="juros" required>
                </div>
                <div class="form-group">
                    <label for="numeroParc">Número de Parcelas:</label>
                    <input type="number" class="form-control" id="numeroParc" name="numeroParc" required>
                </div>
                <div class="form-group">
                    <label for="valorEnt">Valor da Entrada:</label>
                    <input type="number" class="form-control" id="valorEnt" name="valorEnt" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simular Financiamento</button>
    </form>
    <?php if (isset($_SESSION['simulacao'])): ?>
    <div class="container">
        <h2>Resultado da sua simulação:</h2>
        <div class="row">
            <?php foreach ($_SESSION['simulacao'] as $simulacao): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $simulacao['dadoPessoal']['nome']; ?></h5>
                            <p class="card-text">
                                <strong>Valor de cada parcela:</strong> R$
                                <?php echo number_format($simulacao['valorParc'], 2, ',', '.'); ?><br>
                                <strong>Total do financiamento:</strong> R$
                                <?php echo number_format($simulacao['totalFinanc'], 2, ',', '.'); ?><br>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js"></script>
</body>
</html>