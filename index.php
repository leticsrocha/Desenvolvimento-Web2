<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Cadastro</h2>
        
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];

            $databaseUrl = getenv("DATABASE_URL");
            $conexao = pg_connect($databaseUrl);

            pg_query_params(
                $conexao,
                "INSERT INTO usuarios (nome, email, telefone) VALUES ($1, $2, $3)",
                array($nome, $email, $telefone)
            );

            echo "<div style='margin-top: 15px; padding: 10px; background: #e9ecef; border-radius: 4px;'>";
            echo "<p><strong>Nome recebido:</strong> " . $nome . "</p>";
            echo "<p><strong>E-mail recebido:</strong> " . $email . "</p>";
            echo "<p><strong>Telefone recebido:</strong> " . $telefone . "</p>";
            echo "<p><strong>Cadastro realizado com sucesso!</strong></p>";
            echo "</div>";
        }
        ?>

    </div>

</body>
</html>
