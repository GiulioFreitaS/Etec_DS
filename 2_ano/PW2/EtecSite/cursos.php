<?php
$pageTitle = "Etec Zona Leste | Cursos";
$activePage = "cursos";

$tecnicos = [
    "Administração",
    "Contabilidade",
    "Desenvolvimento de Sistemas",
    "Finanças",
    "Logística",
    "Recursos Humanos",
    "Serviços Jurídicos"
];

$mtecs = [
    "Médio Técnico Administração",
    "Médio Técnico Recursos Humanos",
    "Médio Técnico Desenvolvimento de Sistemas",
    "Médio Técnico Logística"
];

$ams = [
    "Médio Técnico Desenvolvimento de Sistemas AMS (Tarde)",
    "Médio Técnico e Superior em Recursos Humanos (AMS)"
];

include 'header.php';
?>

<main>
    <section class="page-banner">
        <div class="container">
            <h2>Cursos</h2>
            <p>Página modelada a partir da organização pública de cursos exibida no site da Etec Zona Leste.</p>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-head">
                <h3>Cursos Técnicos – Modalidade Presencial</h3>
                <p>Trilhas focadas em qualificação profissional, prática e desenvolvimento de competências para o mercado de trabalho.</p>
            </div>

            <div class="grid-3">
                <?php foreach ($tecnicos as $curso): ?>
                    <article class="card">
                        <h4><?php echo $curso; ?></h4>
                        <p>Curso técnico presencial com estrutura pensada para unir teoria, atividades práticas e projetos.</p>
                        <span class="badge">Técnico Presencial</span>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container grid-2">
            <div>
                <div class="section-head">
                    <h3>Ensino Médio Integrado ao Técnico (M-Tec)</h3>
                    <p>Modalidade que combina formação geral do ensino médio com desenvolvimento técnico.</p>
                </div>

                <ul class="list-clean">
                    <?php foreach ($mtecs as $curso): ?>
                        <li><?php echo $curso; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <div class="section-head">
                    <h3>Articulação dos Ensinos Médio, Técnico e Superior (AMS)</h3>
                    <p>Modelo que apoia uma jornada formativa contínua para o estudante.</p>
                </div>

                <ul class="list-clean">
                    <?php foreach ($ams as $curso): ?>
                        <li><?php echo $curso; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>