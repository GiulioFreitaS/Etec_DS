<?php
if (!isset($pageTitle)) { $pageTitle = "Etec Zona Leste"; }
if (!isset($activePage)) { $activePage = ""; }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="topbar">
        <div class="container">
            <span>Inspirado na estrutura institucional da Etec Zona Leste</span>
            <span>Centro Paula Souza • São Paulo</span>
        </div>
    </div>

    <header class="site-header">
        <div class="container navbar">
          <div class="brand">
    <img src="bcc86457-11c2-4045-85e6-7f00ec5cf523.png" alt="Etec Zona Leste" class="logo">
</div>

            <nav class="menu">
                <a class="<?php echo $activePage === 'home' ? 'active' : ''; ?>" href="index.php">Home</a>
                <a class="<?php echo $activePage === 'cursos' ? 'active' : ''; ?>" href="cursos.php">Cursos</a>
                <a class="<?php echo $activePage === 'instituicao' ? 'active' : ''; ?>" href="instituicao.php">Instituição</a>
                <a class="<?php echo $activePage === 'contato' ? 'active' : ''; ?>" href="contato.php">Contato</a>
            </nav>
        </div>
    </header>