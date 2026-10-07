function calcularIdade() {
  const anoNascimento = document.getElementById("anoNascimento").value;
  const anoAtual = new Date().getFullYear();
  const resultado = document.getElementById("resultado");

  if (anoNascimento === "" || anoNascimento > anoAtual) {
    resultado.innerText = "Por favor, insira um ano válido!";
    resultado.style.color = "red";
    return;
  }

  const idade = anoAtual - anoNascimento;
  resultado.innerText = `Você tem ${idade} anos.`;
  resultado.style.color = "green";
}