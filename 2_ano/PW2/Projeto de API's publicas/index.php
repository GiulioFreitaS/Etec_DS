<?php
session_start();

/* ============================================================
 * Configuração
 * A API do REST Countries (v5) exige uma chave. Crie uma conta gratuita em
 * https://restcountries.com e coloque a chave em config.php (veja config.example.php).
 * Sem config.php, usa a chave de demonstração (retorna dados de exemplo).
 * ============================================================ */
if (is_file(__DIR__ . '/config.php')) {
    require __DIR__ . '/config.php';
}
defined('RESTCOUNTRIES_API_KEY') || define('RESTCOUNTRIES_API_KEY', 'rc_live_demo');

/* ============================================================
 * Acesso às APIs públicas
 * ============================================================ */

/**
 * Requisição HTTP GET que devolve o JSON decodificado.
 * Retorna: ['status' => int, 'dados' => array|null, 'falha' => string|null, 'corpo' => string]
 */
function httpGetJson(string $url, array $headers = []): array
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTPHEADER     => array_merge(['Accept: application/json'], $headers),
    ]);
    $corpo  = curl_exec($ch);
    $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $falha  = curl_error($ch);
    curl_close($ch);

    if ($corpo === false) {
        return ['status' => 0, 'dados' => null, 'falha' => $falha ?: 'Falha de conexão', 'corpo' => ''];
    }

    $dados = json_decode($corpo, true);
    return ['status' => $status, 'dados' => is_array($dados) ? $dados : null, 'falha' => null, 'corpo' => $corpo];
}

/** Mensagem de erro devolvida pela própria API (formato {"errors":[{"message":"..."}]}). */
function mensagemDaApi(array $resp): string
{
    $msg = $resp['dados']['errors'][0]['message'] ?? '';
    if ($msg === '') {
        $msg = mb_substr(trim(strip_tags($resp['corpo'] ?? '')), 0, 140);
    }
    return $msg;
}

/** Devolve o texto de um item que pode ser string ou array com o nome em chaves variadas. */
function nomeDoItem($item, string $padrao = ''): string
{
    if (is_string($item)) {
        return $item;
    }
    if (is_array($item)) {
        foreach (['name', 'english', 'english_name', 'name_english', 'common', 'label'] as $chave) {
            if (isset($item[$chave])) {
                if (is_string($item[$chave])) {
                    return $item[$chave];
                }
                if (is_array($item[$chave]) && is_string($item[$chave]['common'] ?? null)) {
                    return $item[$chave]['common'];
                }
            }
        }
    }
    return $padrao;
}

/** Extrai [latitude, longitude] de formatos comuns de coordenadas. */
function extrairCoordenadas($coord): ?array
{
    if (!is_array($coord)) {
        return null;
    }
    if (isset($coord[0], $coord[1]) && is_numeric($coord[0]) && is_numeric($coord[1])) {
        $a = (float) $coord[0];
        $b = (float) $coord[1];
        // Se o primeiro valor passa de 90, ele só pode ser longitude (ordem lng, lat)
        return abs($a) > 90 ? [$b, $a] : [$a, $b];
    }
    $lat = $coord['latitude'] ?? $coord['lat'] ?? null;
    $lng = $coord['longitude'] ?? $coord['lng'] ?? $coord['lon'] ?? $coord['long'] ?? null;
    if (is_numeric($lat) && is_numeric($lng)) {
        return [(float) $lat, (float) $lng];
    }
    return null;
}

/** Converte o registro de país da API (v5) para o formato usado na página. */
function normalizarPais(array $c): array
{
    $nomes = $c['names'] ?? [];
    $por   = $nomes['translations']['por'] ?? [];

    $moedas = [];
    foreach (($c['currencies'] ?? []) as $chave => $m) {
        $nome    = nomeDoItem($m, is_string($chave) ? $chave : '');
        $simbolo = is_array($m) && is_string($m['symbol'] ?? null) ? $m['symbol'] : '';
        if ($nome !== '') {
            $moedas[] = $nome . ($simbolo !== '' ? " ({$simbolo})" : '');
        }
    }

    $idiomas = [];
    foreach (($c['languages'] ?? []) as $chave => $l) {
        $nome = nomeDoItem($l, is_string($chave) ? $chave : '');
        if ($nome !== '') {
            $idiomas[] = $nome;
        }
    }

    $capital = $c['capitals'][0] ?? null;
    $area    = $c['area'] ?? 0;
    if (is_array($area)) {
        $area = $area['kilometers'] ?? 0;
    }

    return [
        'nome'      => $por['common'] ?? ($nomes['common'] ?? ''),
        'nomeEn'    => $nomes['common'] ?? '',
        'oficial'   => $por['official'] ?? ($nomes['official'] ?? ''),
        'capital'   => is_array($capital) ? nomeDoItem($capital) : nomeDoItem($capital ?? ''),
        'coord'     => is_array($capital) ? extrairCoordenadas($capital['coordinates'] ?? null) : null,
        'regiao'    => trim(($c['region'] ?? '') . (!empty($c['subregion']) ? ' · ' . $c['subregion'] : '')),
        'populacao' => (int) ($c['population'] ?? 0),
        'area'      => (float) $area,
        'moedas'    => $moedas,
        'idiomas'   => $idiomas,
        'bandeira'  => $c['flag']['url_svg'] ?? ($c['flag']['url_png'] ?? ''),
    ];
}

/**
 * API 4 — REST Countries (v5).
 * Retorna: ['pais' => array|null, 'outros' => array, 'demo' => bool, 'erro' => string|null]
 */
function buscarPais(string $nome): array
{
    $vazio = ['pais' => null, 'outros' => [], 'demo' => false];

    $resp = httpGetJson(
        'https://api.restcountries.com/countries/v5/name?q=' . rawurlencode($nome),
        ['Authorization: Bearer ' . RESTCOUNTRIES_API_KEY]
    );

    if ($resp['falha'] !== null) {
        return $vazio + ['erro' => "Não foi possível consultar o REST Countries ({$resp['falha']})."];
    }
    if (in_array($resp['status'], [401, 403], true)) {
        return $vazio + ['erro' => 'Chave de API do REST Countries inválida ou limite do plano atingido. ' . mensagemDaApi($resp)];
    }
    if ($resp['status'] === 429) {
        return $vazio + ['erro' => 'Muitas consultas seguidas. Aguarde alguns segundos e tente de novo.'];
    }
    if ($resp['status'] !== 200 || !is_array($resp['dados']['data']['objects'] ?? null)) {
        return $vazio + ['erro' => "Serviço indisponível no momento (HTTP {$resp['status']}). " . mensagemDaApi($resp)];
    }

    $lista = $resp['dados']['data']['objects'];
    $demo  = isset($resp['dados']['data']['_demo']);

    if (!$lista) {
        return $vazio + ['demo' => $demo, 'erro' => 'País não encontrado. Tente outro nome (ex.: Brasil, Japan, Canada).'];
    }

    // Prefere correspondência exata (ex.: "India" em vez de um território com "indian" no nome)
    $escolhido = $lista[0];
    $busca     = mb_strtolower($nome);
    foreach ($lista as $item) {
        $n = $item['names'] ?? [];
        $candidatos = [
            mb_strtolower($n['common'] ?? ''),
            mb_strtolower($n['official'] ?? ''),
            mb_strtolower($n['translations']['por']['common'] ?? ''),
        ];
        if (in_array($busca, $candidatos, true)) {
            $escolhido = $item;
            break;
        }
    }

    $outros = [];
    foreach ($lista as $item) {
        if ($item !== $escolhido && count($outros) < 5) {
            $n        = normalizarPais($item);
            $outros[] = $n['nome'] ?: $n['nomeEn'];
        }
    }

    return ['pais' => normalizarPais($escolhido), 'outros' => $outros, 'demo' => $demo, 'erro' => null];
}

/**
 * API 3 — Open-Meteo (sem chave).
 * Clima atual + previsão de 4 dias para as coordenadas informadas.
 */
function buscarClima(float $lat, float $lng): array
{
    $query = http_build_query([
        'latitude'      => $lat,
        'longitude'     => $lng,
        'current'       => 'temperature_2m,apparent_temperature,relative_humidity_2m,wind_speed_10m,weather_code',
        'daily'         => 'weather_code,temperature_2m_max,temperature_2m_min',
        'forecast_days' => 4,
        'timezone'      => 'auto',
    ]);

    $resp = httpGetJson("https://api.open-meteo.com/v1/forecast?{$query}");

    if ($resp['falha'] !== null || $resp['status'] !== 200 || empty($resp['dados']['current'])) {
        $detalhe = $resp['falha'] ?? "HTTP {$resp['status']}";
        return ['clima' => null, 'erro' => "Não foi possível obter o clima agora ({$detalhe})."];
    }

    return ['clima' => $resp['dados'], 'erro' => null];
}

/* ============================================================
 * Utilidades
 * ============================================================ */

function e($texto): string
{
    return htmlspecialchars((string) ($texto ?? ''), ENT_QUOTES, 'UTF-8');
}

/** Traduz o código WMO do Open-Meteo em [descrição, emoji]. */
function descreverClima(int $codigo): array
{
    $mapa = [
        0  => ['Céu limpo', '☀️'],
        1  => ['Predominantemente limpo', '🌤️'],
        2  => ['Parcialmente nublado', '⛅'],
        3  => ['Nublado', '☁️'],
        45 => ['Neblina', '🌫️'],
        48 => ['Neblina com geada', '🌫️'],
        51 => ['Garoa fraca', '🌦️'],
        53 => ['Garoa moderada', '🌦️'],
        55 => ['Garoa forte', '🌦️'],
        56 => ['Garoa congelante', '🌧️'],
        57 => ['Garoa congelante forte', '🌧️'],
        61 => ['Chuva fraca', '🌧️'],
        63 => ['Chuva moderada', '🌧️'],
        65 => ['Chuva forte', '🌧️'],
        66 => ['Chuva congelante', '🌧️'],
        67 => ['Chuva congelante forte', '🌧️'],
        71 => ['Neve fraca', '🌨️'],
        73 => ['Neve moderada', '🌨️'],
        75 => ['Neve forte', '❄️'],
        77 => ['Grãos de neve', '🌨️'],
        80 => ['Pancadas de chuva fracas', '🌦️'],
        81 => ['Pancadas de chuva', '🌦️'],
        82 => ['Pancadas de chuva fortes', '⛈️'],
        85 => ['Pancadas de neve', '🌨️'],
        86 => ['Pancadas de neve fortes', '❄️'],
        95 => ['Trovoada', '⛈️'],
        96 => ['Trovoada com granizo', '⛈️'],
        99 => ['Trovoada com granizo forte', '⛈️'],
    ];
    return $mapa[$codigo] ?? ['Condição desconhecida', '🌡️'];
}

function diaDaSemana(string $data): string
{
    $dias = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
    return $dias[(int) date('w', strtotime($data))] . ' ' . date('d/m', strtotime($data));
}

/* ============================================================
 * Fluxo da página
 * ============================================================ */

if (isset($_GET['limpar'])) {
    unset($_SESSION['historico']);
    header('Location: index.php');
    exit;
}

$termo     = trim($_GET['pais'] ?? '');
$pais      = null;
$outros    = [];
$ehDemo    = false;
$erroPais  = null;
$clima     = null;
$erroClima = null;

if ($termo !== '') {
    if (mb_strlen($termo) > 60 || !preg_match('/^[\p{L}\s.\'-]+$/u', $termo)) {
        $erroPais = 'Nome inválido. Use apenas letras (ex.: Brasil, United States).';
    } else {
        $busca    = buscarPais($termo);
        $pais     = $busca['pais'];
        $outros   = $busca['outros'];
        $ehDemo   = $busca['demo'];
        $erroPais = $busca['erro'];
    }
}

if ($pais) {
    if ($pais['capital'] !== '' && $pais['coord']) {
        $res       = buscarClima($pais['coord'][0], $pais['coord'][1]);
        $clima     = $res['clima'];
        $erroClima = $res['erro'];
    }

    // Histórico na sessão
    $rotulo    = $pais['nome'] ?: $pais['nomeEn'];
    $historico = array_values(array_diff($_SESSION['historico'] ?? [], [$rotulo]));
    array_unshift($historico, $rotulo);
    $_SESSION['historico'] = array_slice($historico, 0, 6);
}

$historico = $_SESSION['historico'] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Países &amp; Clima | REST Countries + Open-Meteo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Título do sistema -->
  <header class="hero">
    <div class="container text-center">
      <span class="hero-badge">REST Countries + Open-Meteo</span>
      <h1 class="hero-title">🌍 Países &amp; Clima</h1>
      <p class="hero-sub">Pesquise um país e veja seus dados e o tempo agora na capital.</p>
    </div>
  </header>

  <main class="container main-content">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8 col-xl-7">

        <!-- Formulário: campo de pesquisa + botão de consulta -->
        <form method="get" action="index.php" class="search-card" autocomplete="off">
          <label for="pais" class="search-label">Nome do país</label>
          <div class="search-row">
            <input type="text" id="pais" name="pais"
                   class="form-control search-input <?= $erroPais ? 'is-invalid' : '' ?>"
                   placeholder="Ex.: Brasil, Japan, Portugal" maxlength="60" required autofocus
                   value="<?= e($termo) ?>">
            <button type="submit" class="btn btn-consultar">Consultar</button>
          </div>
          <small class="search-hint">O PHP consulta o REST Countries e, com as coordenadas da capital, o Open-Meteo.</small>
        </form>

        <!-- Área para apresentação dos resultados -->
        <section class="resultados" aria-live="polite">

          <?php if ($erroPais): ?>
            <div class="msg-erro">
              <span class="msg-icone">⚠️</span>
              <div><?= e($erroPais) ?></div>
            </div>

          <?php elseif ($pais): ?>

            <?php if ($ehDemo): ?>
              <div class="msg-aviso">
                ℹ️ <strong>Modo demonstração:</strong> a chave de demonstração do REST Countries retorna dados de exemplo.
                Crie uma chave gratuita em <a href="https://restcountries.com" target="_blank" rel="noopener">restcountries.com</a>
                e coloque no <code>config.php</code> para ver dados reais.
              </div>
            <?php endif; ?>

            <!-- Cartão do país -->
            <article class="resultado-card">
              <div class="pais-topo">
                <?php if ($pais['bandeira']): ?>
                  <img class="bandeira" src="<?= e($pais['bandeira']) ?>" alt="Bandeira de <?= e($pais['nome']) ?>">
                <?php endif; ?>
                <div>
                  <h2 class="pais-nome"><?= e($pais['nome'] ?: $pais['nomeEn']) ?></h2>
                  <div class="pais-oficial"><?= e($pais['oficial']) ?></div>
                </div>
              </div>

              <div class="row g-3">
                <div class="col-6">
                  <div class="campo"><span class="campo-rotulo">Capital</span>
                    <span class="campo-valor"><?= e($pais['capital'] ?: '—') ?></span></div>
                </div>
                <div class="col-6">
                  <div class="campo"><span class="campo-rotulo">Região</span>
                    <span class="campo-valor"><?= e($pais['regiao'] ?: '—') ?></span></div>
                </div>
                <div class="col-6">
                  <div class="campo"><span class="campo-rotulo">População</span>
                    <span class="campo-valor"><?= number_format($pais['populacao'], 0, ',', '.') ?></span></div>
                </div>
                <div class="col-6">
                  <div class="campo"><span class="campo-rotulo">Área</span>
                    <span class="campo-valor"><?= number_format($pais['area'], 0, ',', '.') ?> km²</span></div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="campo"><span class="campo-rotulo">Moeda</span>
                    <span class="campo-valor"><?= e($pais['moedas'] ? implode(', ', $pais['moedas']) : '—') ?></span></div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="campo"><span class="campo-rotulo">Idiomas</span>
                    <span class="campo-valor"><?= e($pais['idiomas'] ? implode(', ', $pais['idiomas']) : '—') ?></span></div>
                </div>
              </div>

              <?php if ($outros): ?>
                <div class="outros">
                  Outros resultados:
                  <?php foreach ($outros as $o): ?>
                    <a href="index.php?pais=<?= urlencode($o) ?>"><?= e($o) ?></a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </article>

            <!-- Cartão do clima -->
            <?php if ($clima): ?>
              <?php
                $atual = $clima['current'];
                [$descAtual, $emojiAtual] = descreverClima((int) ($atual['weather_code'] ?? -1));
                $unid  = $clima['current_units'] ?? [];
                $d     = $clima['daily'] ?? [];
              ?>
              <article class="clima-card">
                <div class="clima-titulo">Clima agora em <strong><?= e($pais['capital']) ?></strong></div>

                <div class="clima-principal">
                  <div class="clima-emoji"><?= $emojiAtual ?></div>
                  <div>
                    <div class="clima-temp"><?= e(round($atual['temperature_2m'])) ?>°C</div>
                    <div class="clima-desc"><?= e($descAtual) ?></div>
                  </div>
                </div>

                <div class="clima-detalhes">
                  <div><span>Sensação</span><strong><?= e(round($atual['apparent_temperature'])) ?>°C</strong></div>
                  <div><span>Umidade</span><strong><?= e($atual['relative_humidity_2m']) ?>%</strong></div>
                  <div><span>Vento</span><strong><?= e(round($atual['wind_speed_10m'])) ?> <?= e($unid['wind_speed_10m'] ?? 'km/h') ?></strong></div>
                </div>

                <?php if (!empty($d['time'])): ?>
                  <div class="previsao">
                    <?php foreach ($d['time'] as $i => $dia): ?>
                      <?php [, $emojiDia] = descreverClima((int) ($d['weather_code'][$i] ?? -1)); ?>
                      <div class="previsao-dia">
                        <span class="previsao-data"><?= e($i === 0 ? 'Hoje' : diaDaSemana($dia)) ?></span>
                        <span class="previsao-emoji"><?= $emojiDia ?></span>
                        <span class="previsao-temp">
                          <?= e(round($d['temperature_2m_max'][$i])) ?>° <small><?= e(round($d['temperature_2m_min'][$i])) ?>°</small>
                        </span>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </article>

            <?php elseif ($erroClima): ?>
              <div class="msg-aviso">⚠️ <?= e($erroClima) ?></div>
            <?php else: ?>
              <div class="msg-aviso">Não foi possível localizar a capital deste país, então não há clima para exibir.</div>
            <?php endif; ?>

          <?php else: ?>
            <div class="vazio">
              <div class="vazio-icone">🔎</div>
              <p class="mb-0">Os dados do país e o clima da capital aparecerão aqui.</p>
            </div>
          <?php endif; ?>
        </section>

        <!-- Histórico (sessão PHP) -->
        <?php if ($historico): ?>
          <section class="historico">
            <div class="historico-topo">
              <h2>Consultas recentes</h2>
              <a href="index.php?limpar=1">Limpar</a>
            </div>
            <div class="historico-lista">
              <?php foreach ($historico as $item): ?>
                <a class="chip" href="index.php?pais=<?= urlencode($item) ?>"><?= e($item) ?></a>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endif; ?>

      </div>
    </div>
  </main>

  <footer class="rodape">
    Dados de <a href="https://restcountries.com" target="_blank" rel="noopener">REST Countries</a>
    e <a href="https://open-meteo.com" target="_blank" rel="noopener">Open-Meteo</a>
  </footer>
</body>
</html>
