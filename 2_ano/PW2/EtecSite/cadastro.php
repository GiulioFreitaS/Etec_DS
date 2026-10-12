<?php include 'header.php'; ?>

<main>
    <section class="page-banner">
        <div class="container">
            <h2>Cadastro</h2>
            <p>Preencha os dados abaixo.</p>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="contact-box">
                <form action="confirmar.php" method="POST">
                    <p>
                        <label>Nome:</label><br>
                        <input type="text" name="nome" required style="width:100%;padding:12px;border:1px solid #ccc;border-radius:10px;">
                    </p>

                    <p>
                        <label>E-mail:</label><br>
                        <input type="email" name="email" required style="width:100%;padding:12px;border:1px solid #ccc;border-radius:10px;">
                    </p>

                    <p>
                        <label>Curso:</label><br>
                        <select name="curso" required style="width:100%;padding:12px;border:1px solid #ccc;border-radius:10px;">
                            <option value="">Selecione</option>
                            <option value="Administração">Administração</option>
                            <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
                            <option value="Logística">Logística</option>
                            <option value="Recursos Humanos">Recursos Humanos</option>
                        </select>
                    </p>

                    <p>
                        <label>Telefone:</label><br>
                        <input type="text" name="telefone" required style="width:100%;padding:12px;border:1px solid #ccc;border-radius:10px;">
                    </p>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>