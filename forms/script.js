/*
Resgatando a classe de um elemento
function teste() {
  let num = window.document.getElementsByClassName('num')[0]
  console.log(num.classList.contains('num'))
}
*/
//window.document.getElementsByClassName('btne')[0]style.backgroundColor = '#00ff00'

var pontuacao = 0

function salvar(listaC){

  let N_inciso = listaC[1].slice(3)-1
  let ntxt = window.document.getElementsByClassName('ponto')[N_inciso]
  let num = Number(ntxt.value)
  pontuacao += num
  let res = window.document.getElementById('total')

  res.innerHTML = `Pontuação Total: ${pontuacao}`

  ntxt.readOnly = true

  let botaoE = window.document.getElementsByClassName('btne')[N_inciso]
  let botaoS = window.document.getElementsByClassName('btn')[N_inciso]
  botaoS.style.backgroundColor = '#828282'
  botaoE.style.backgroundColor = '#166441'
  botaoS.disabled = true
}

function editar(listaC) {
  let N_inciso = listaC[1].slice(3)-1
  let ntxt = window.document.getElementsByClassName('ponto')[N_inciso]
  let num = Number(ntxt.value)
  pontuacao -= num
  let res = window.document.getElementById('total')
  res.innerHTML = `Pontuação Total: ${pontuacao}`

  ntxt.readOnly = false
  ntxt.focus()

  let botaoS = window.document.getElementsByClassName('btn')[N_inciso]
  let botaoE = window.document.getElementsByClassName('btne')[N_inciso]
  botaoE.style.backgroundColor = '#828282'
  botaoS.style.backgroundColor = '#166441'
  botaoS.disabled = false
}

function limpar() {
  let botaoS = window.document.getElementsByClassName('btn')
  let botaoE = window.document.getElementsByClassName('btne')
  for(i=0; i< botaoS.length; i++){
    botaoE[i].style.backgroundColor = '#828282'
    botaoS[i].style.backgroundColor = '#166441'
    botaoS[i].disabled = false
  }

  pontuacao = 0
  let res = window.document.getElementById('total')
  res.innerHTML = `Pontuação Total: ${pontuacao}`
}