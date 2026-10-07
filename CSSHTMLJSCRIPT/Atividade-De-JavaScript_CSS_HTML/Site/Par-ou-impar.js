function verificarNumero() {
  const numero = document.getElementById("numero").value;
  const resultado = document.getElementById("resultado");

  if (numero === "") {
    resultado.innerText = "Por favor, insira um número!";
    resultado.style.color = "red";
    return;
  }

  if (numero % 2 === 0) {
    resultado.innerText = `O número ${numero} é PAR.`;
    resultado.style.color = "blue";
  } else {
    resultado.innerText = `O número ${numero} é ÍMPAR.`;
    resultado.style.color = "purple";
  }
}