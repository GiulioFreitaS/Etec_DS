<?php
include 'header.php';

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$curso = $_POST['curso'] ?? '';
$telefone = $_POST['telefone'] ?? '';
?>

<main>
    <section class="page-banner">
        <div class="container">
            <h2>Confirmação de Cadastro</h2>
            <p>Veja os dados enviados.</p>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="contact-box">
                <h3>Dados cadastrados:</h3>
                <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
                <p><strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Curso:</strong> <?php echo htmlspecialchars($curso); ?></p>
                <p><strong>Telefone:</strong> <?php echo htmlspecialchars($telefone); ?></p>

                <br>
                <a href="cadastro.php" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>