<?php
$pageTitle = "Etec Zona Leste | Contato";
$activePage = "contato";

$horarios = [
    ["setor" => "Atendimento geral", "horario" => "Seg. a Sex. das 09h às 21h"],
    ["setor" => "Contato telefônico", "horario" => "(11) 2045-4000 / 2045-4016"],
    ["setor" => "Localização", "horario" => "Avenida Águia de Haia, 2.633 - Cidade AE Carvalho - São Paulo/SP"]
];

include 'header.php';
?>

<main>
    <section class="page-banner">
        <div class="container">
            <h2>Contato</h2>
            <p>Página de contato inspirada nas informações públicas presentes no rodapé do site institucional.</p>
        </div>
    </section>

    <section>
        <div class="container contact-grid">
            <div class="contact-box">
                <h3>Fale com a Etec Zona Leste</h3>
                <p><strong>Endereço:</strong> Avenida Águia de Haia, 2.633 - Cidade AE Carvalho - São Paulo/SP - CEP: 03694-000</p>
                <p><strong>Telefone:</strong> (11) 2045-4000 / 2045-4016</p>
                <p><strong>Horário de funcionamento:</strong> Seg. a Sex. das 09h às 21h</p>
                <p><strong>Observação:</strong> Neste modelo, os botões e formulários podem ser conectados depois a e-mail, banco de dados ou WhatsApp.</p>
            </div>

            <div class="contact-box">
                <h3>Formulário visual</h3>
                <p>Modelo simples para deixar a página mais completa.</p>
                <form>
                    <p><input style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:12px" type="text" placeholder="Seu nome"></p>
                    <p><input style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:12px" type="email" placeholder="Seu e-mail"></p>
                    <p><textarea style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:12px;min-height:140px" placeholder="Sua mensagem"></textarea></p>
                    <button class="btn btn-primary" type="button">Enviar</button>
                </form>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-head">
                <h3>Resumo rápido</h3>
                <p>Exemplo de quadro informativo para horários e dados públicos.</p>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Informação</th>
                            <th>Detalhe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($horarios as $item): ?>
                            <tr>
                                <td><?php echo $item['setor']; ?></td>
                                <td><?php echo $item['horario']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>