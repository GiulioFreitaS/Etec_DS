<?php
$pageTitle = "Etec Zona Leste | Instituição";
$activePage = "instituicao";

$linksInstituicao = [
    "Sobre Nós",
    "Plano Plurianual de Gestão",
    "Manual do Aluno 2025",
    "Regimento Comum das Etecs",
    "Reserva de Laboratório",
    "Suporte Técnico"
];

$departamentos = [
    "Secretaria Acadêmica",
    "Coordenação de Cursos",
    "Direção",
    "Coordenação Pedagógica",
    "APM"
];

include 'header.php';
?>

<main>
    <section class="page-banner">
        <div class="container">
            <h2>Instituição</h2>
            <p>Seção criada para refletir a parte institucional, departamentos e documentos citados no portal público.</p>
        </div>
    </section>

    <section>
        <div class="container grid-2">
            <div class="info-box">
                <h3>Sobre a Etec Zona Leste</h3>
                <p>A escola apresenta cursos técnicos gratuitos voltados à formação de profissionais qualificados para o mercado de trabalho, ao mesmo tempo em que oferece base teórica e prática em diversas áreas.</p>
                <p class="highlight">Infraestrutura moderna, laboratórios equipados e foco em projetos estudantis.</p>
            </div>

            <div class="info-box">
                <h3>Sala Maker</h3>
                <p>O site institucional descreve a sala maker como um espaço físico dedicado à criação, experimentação e inovação dentro da Etec Zona Leste.</p>
                <p>Essa área pode ser destacada em projetos, portfólios, feiras e ações de cultura maker.</p>
            </div>
        </div>
    </section>

    <section>
        <div class="container grid-2">
            <div>
                <div class="section-head">
                    <h3>Documentos e atalhos institucionais</h3>
                    <p>Itens exibidos na área institucional do site.</p>
                </div>

                <ul class="list-clean">
                    <?php foreach ($linksInstituicao as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <div class="section-head">
                    <h3>Departamentos</h3>
                    <p>Exemplo de separação de setores para orientar navegação e organização interna do site.</p>
                </div>

                <ul class="list-clean">
                    <?php foreach ($departamentos as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>