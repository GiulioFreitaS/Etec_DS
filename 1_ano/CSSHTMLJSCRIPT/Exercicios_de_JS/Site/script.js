// 1️⃣ Verificador de Idade para Habilitação
function podeDirigir(idade) {
  return idade >= 18 ? "Pode ser habilitado(a)" : "Ainda não pode";
}
function mostrarPodeDirigir() {
  const idade = parseInt(document.getElementById("idade").value);
  document.getElementById("res1").innerText = podeDirigir(idade);
}

// 2️⃣ Maior entre Três
function encontrarMaiorEntreTres(a, b, c) {
  if (a > b && a > c) return `${a} é o maior`;
  else if (b > a && b > c) return `${b} é o maior`;
  else if (c > a && c > b) return `${c} é o maior`;
  else return "Há números iguais";
}
function mostrarMaior() {
  const a = Number(document.getElementById("a").value);
  const b = Number(document.getElementById("b").value);
  const c = Number(document.getElementById("c").value);
  document.getElementById("res2").innerText = encontrarMaiorEntreTres(a, b, c);
}

// 3️⃣ Classificador de Moedas
function classificarMoeda(valor) {
  if (valor === 0.01) return "Um Centavo";
  else if (valor === 0.05) return "Cinco Centavos";
  else if (valor === 0.10) return "Dez Centavos";
  else if (valor === 0.25) return "Vinte e Cinco Centavos";
  else if (valor === 0.50) return "Cinquenta Centavos";
  else if (valor === 1.00) return "Um Real";
  else return "Valor Desconhecido";
}
function mostrarMoeda() {
  const valor = parseFloat(document.getElementById("moeda").value);
  document.getElementById("res3").innerText = classificarMoeda(valor);
}

// 4️⃣ Verificador de Senha Forte
function senhaForte(senha) {
  return senha.length > 8 && senha !== "12345678";
}
function mostrarSenha() {
  const senha = document.getElementById("senha").value;
  document.getElementById("res4").innerText = senhaForte(senha)
    ? "Senha Forte ✅"
    : "Senha Fraca ❌";
}

// 5️⃣ Alerta de Temperatura
function checarTemperatura(temp) {
  if (temp < 10) return "Alerta de Frio";
  else if (temp <= 25) return "Temperatura Ideal";
  else return "Alerta de Calor";
}
function mostrarTemperatura() {
  const temp = parseFloat(document.getElementById("temp").value);
  document.getElementById("res5").innerText = checarTemperatura(temp);
}

// 6️⃣ Dia da Semana
function nomeDoDia(numero) {
  switch (numero) {
    case 1: return "Domingo";
    case 2: return "Segunda";
    case 3: return "Terça";
    case 4: return "Quarta";
    case 5: return "Quinta";
    case 6: return "Sexta";
    case 7: return "Sábado";
    default: return "Número inválido (1 a 7)";
  }
}
function mostrarDia() {
  const numero = parseInt(document.getElementById("dia").value);
  document.getElementById("res6").innerText = nomeDoDia(numero);
}

// 7️⃣ Tipo de Triângulo
function tipoTriangulo(l1, l2, l3) {
  if (l1 === l2 && l2 === l3) return "Equilátero";
  else if (l1 === l2 || l1 === l3 || l2 === l3) return "Isósceles";
  else return "Escaleno";
}
function mostrarTriangulo() {
  const l1 = Number(document.getElementById("l1").value);
  const l2 = Number(document.getElementById("l2").value);
  const l3 = Number(document.getElementById("l3").value);
  document.getElementById("res7").innerText = tipoTriangulo(l1, l2, l3);
}

// 8️⃣ Nome Completo
function gerarNomeCompleto(pessoa) {
  return pessoa.primeiroNome + " " + pessoa.sobrenome;
}
function mostrarNomeCompleto() {
  const nome = document.getElementById("nome").value;
  const sobrenome = document.getElementById("sobrenome").value;
  document.getElementById("res8").innerText = gerarNomeCompleto({
    primeiroNome: nome,
    sobrenome: sobrenome
  });
}

// 9️⃣ Média Simples
function calcularMediaSimples(n1, n2) {
  const media = (n1 + n2) / 2;
  return media.toFixed(2); // Retorna o número com duas casas decimais
}

function mostrarMedia() {
  const n1 = Number(document.getElementById("n1").value);
  const n2 = Number(document.getElementById("n2").value);
  const resultado = calcularMediaSimples(n1, n2);
  document.getElementById("res9").innerText = `A média é ${resultado}`;
}

// 🔟 Formatar Telefone
function formatarTelefone(numero) {
  return numero.length === 9
    ? numero.slice(0, 5) + "-" + numero.slice(5)
    : "Número inválido (9 dígitos)";
}
function mostrarTelefone() {
  const numero = document.getElementById("tel").value;
  document.getElementById("res10").innerText = formatarTelefone(numero);
}
