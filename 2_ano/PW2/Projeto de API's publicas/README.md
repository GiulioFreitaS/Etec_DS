# 🌍 Países & Clima (PHP + REST Countries + Open-Meteo)

Aplicação web em **PHP** que consulta **duas APIs públicas**, recebe as respostas em **JSON**, processa os dados e os apresenta dinamicamente ao usuário.

O usuário informa o nome de um país → o PHP consulta o **REST Countries** → usa as coordenadas da capital para consultar o **Open-Meteo** → exibe os dados do país e o clima atual da capital.

## Funcionalidades

- Página inicial com título, formulário, campo de pesquisa, botão **Consultar** e área de resultados
- Busca por nome em **português ou inglês** (ex.: `Brasil`, `Japan`, `Alemanha`)
- Dados do país: bandeira, nome oficial, capital, região, população, área, moedas e idiomas
- Clima atual da capital: temperatura, sensação térmica, umidade, vento e condição do tempo
- Previsão para os próximos dias (máx./mín.)
- Integração entre as APIs: as coordenadas da capital (REST Countries) alimentam a consulta de clima (Open-Meteo)
- Tratamento de erros: nome inválido, país inexistente e falha de qualquer uma das APIs (se o clima falhar, os dados do país continuam aparecendo)
- Histórico das últimas consultas salvo na sessão PHP
- Saída escapada com `htmlspecialchars` (proteção contra XSS)
- Layout responsivo com Bootstrap 5

## Tecnologias

- PHP 8+ (com extensão cURL habilitada)
- HTML5, CSS3
- Bootstrap 5

## APIs utilizadas

### REST Countries
`GET https://restcountries.com/v3.1/name/{nome}`
(se não encontrar, tenta `GET https://restcountries.com/v3.1/translation/{nome}`)

Campos usados: `name`, `translations`, `capital`, `capitalInfo.latlng`, `population`, `area`, `region`, `subregion`, `currencies`, `languages`, `flags`.

### Open-Meteo
`GET https://api.open-meteo.com/v1/forecast?latitude={lat}&longitude={lng}&current=temperature_2m,...&daily=...`

Não exige chave de API.

## Como executar

1. Clone o repositório:
   ```bash
   git clone https://github.com/SEU-USUARIO/SEU-REPOSITORIO.git
   cd SEU-REPOSITORIO
   ```
2. Inicie o servidor embutido do PHP:
   ```bash
   php -S localhost:8000
   ```
3. Acesse <http://localhost:8000> no navegador.

> Também funciona no XAMPP/WAMP: copie a pasta para `htdocs` e acesse `http://localhost/NOME-DA-PASTA`.

## Estrutura

```
├── index.php    # formulário, requisições às APIs, tratamento do JSON e exibição
├── style.css    # estilos personalizados
└── README.md
```

## Como funciona

1. O usuário digita o nome do país e clica em **Consultar** (`GET index.php?pais=...`).
2. O PHP valida o texto e faz `GET` no REST Countries.
3. Do JSON do país, o PHP extrai a capital e suas coordenadas.
4. Com as coordenadas, o PHP faz `GET` no Open-Meteo.
5. Os dois JSONs são interpretados (`json_decode`) e exibidos nos cartões de país e de clima.

## Vídeo de demonstração

🎥 [Link do YouTube](COLE-AQUI-O-LINK)

## Autor

Seu nome — curso/turma
