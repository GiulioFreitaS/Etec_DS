<?php
$pageTitle = "Etec Zona Leste | Home";
$activePage = "home";

$courses = [
    ["name" => "Administração", "type" => "Técnico Presencial"],
    ["name" => "Contabilidade", "type" => "Técnico Presencial"],
    ["name" => "Desenvolvimento de Sistemas", "type" => "Técnico Presencial"],
    ["name" => "Finanças", "type" => "Técnico Presencial"],
    ["name" => "Logística", "type" => "Técnico Presencial"],
    ["name" => "Recursos Humanos", "type" => "Técnico Presencial"],
    ["name" => "Serviços Jurídicos", "type" => "Técnico Presencial"]
];

$highlights = [
    "1º Desafio 24 Horas de Inovação Global – Inova CPS",
    "Feira Tecnológica 2025 — Etec Zona Leste",
    "AMS da Etec Zona Leste recebe uma premiação no CNIT do Estado de São Paulo",
    "Prova Paulista Seriado – 2025"
];

$events = [
    ["date" => "13 abr a 14 abr", "title" => "Eleição Pleito do Grêmio Estudantil"],
    ["date" => "22 abr", "title" => "Imposto de Renda 2026"],
    ["date" => "09 maio", "title" => "Dia da Escola Família"],
    ["date" => "13 maio a 15 maio", "title" => "Semana Paulo Freire"],
    ["date" => "20 jun", "title" => "Festa das Nações"]
];

include 'header.php';
?>

<main>
    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-copy">
                <h2>Formação técnica com foco em inovação, prática e futuro profissional</h2>
                <p>Modelo de site com cara mais completa e institucional, inspirado na navegação do portal da Etec Zona Leste, com áreas para cursos, estrutura, destaques, agenda e contato.</p>
                <div class="btn-row">
                    <a class="btn btn-primary" href="cursos.php">Explorar cursos</a>
                    <a class="btn btn-secondary" href="contato.php">Fale com a escola</a>
                </div>
            </div>

            <aside class="hero-card">
                <h3>Resumo da escola</h3>
                <ul>
                    <li>Cursos técnicos presenciais em várias áreas.</li>
                    <li>Ensino Médio integrado ao técnico (M-Tec).</li>
                    <li>AMS com trilhas voltadas à continuidade acadêmica.</li>
                    <li>Infraestrutura com laboratórios, notebooks e impressoras 3D.</li>
                </ul>
            </aside>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-head">
                <h3>Conheça a nossa infraestrutura</h3>
                <p>O site oficial destaca uma infraestrutura moderna com laboratórios e salas equipadas com televisões, computadores, notebooks, impressoras 3D e outros recursos para projetos estudantis.</p>
            </div>

            <div class="grid-3">
                <article class="card">
                    <h4>Laboratórios</h4>
                    <p>Ambientes voltados para aulas práticas, atividades técnicas e desenvolvimento de projetos ao longo do curso.</p>
                </article>

                <article class="card">
                    <h4>Sala Maker</h4>
                    <p>Espaço de criação, experimentação e inovação para estimular prototipagem, colaboração e aprendizagem prática.</p>
                </article>

                <article class="card">
                    <h4>Base teórica e prática</h4>
                    <p>A proposta institucional combina formação qualificada para o mercado com desenvolvimento acadêmico consistente.</p>
                </article>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-head">
                <h3>Cursos em destaque</h3>
                <p>Uma amostra dos cursos técnicos presenciais apresentados na navegação pública da escola.</p>
            </div>

            <div class="grid-3">
                <?php foreach ($courses as $course): ?>
                    <article class="card">
                        <h4><?php echo $course['name']; ?></h4>
                        <p>Formação com foco em desenvolvimento profissional, organização de rotinas e aplicação prática de conteúdos.</p>
                        <span class="badge"><?php echo $course['type']; ?></span>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container grid-2">
            <div>
                <div class="section-head">
                    <h3>Destaques</h3>
                    <p>Seção inspirada nas notícias e chamadas que aparecem na página inicial.</p>
                </div>

                <ul class="list-clean">
                    <?php foreach ($highlights as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <div class="section-head">
                    <h3>Agenda de eventos</h3>
                    <p>Exemplo visual para apresentar atividades institucionais e eventos para alunos e comunidade.</p>
                </div>

                <div class="grid-2">
                    <?php foreach ($events as $event): ?>
                        <article class="card">
                            <span class="event-date"><?php echo $event['date']; ?></span>
                            <h4><?php echo $event['title']; ?></h4>
                            <p>Evento institucional.</p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="cta-box">
                <h3>Links úteis</h3>
                <p>O site oficial também reúne atalhos como oportunidades, PPG, Manual do Aluno, Vestibulinho, Regimento Comum, NSA, e-mail institucional e contato.</p>
                <div class="btn-row">
                    <a class="btn btn-primary" href="instituicao.php">Ver área institucional</a>
                    <a class="btn btn-secondary" href="contato.php">Ir para contato</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>