"use strict"
let chat = new Vue({
  el: "div#chat",
  data: {
    mensajes: [],
    invertido: false
  }
})
let puntajevue = new Vue({
  el:"div.puntaje",
  data: {
    puntaje: 1
  }
})
let idmesa = window.location.href.slice(-2);
let idusuario = document.querySelector('div.fantasmin').id;
function invertirOrden() {
  if (chat.invertido) {
    chat.invertido = false;
  }else{
    chat.invertido = true;
  }
  getMensajes();
}
function getPuntajes(){
  fetch('api/mesa/'+idmesa+'/puntaje')
  .then(response=>response.json())
  .then(puntaje=>{
    puntajevue.puntaje=puntaje;
  }).catch(error => console.log(error));
}
function addPuntaje(){
  let puntaje = document.querySelector('input.puntaje').value;
  let data = {
    puntaje:puntaje
  }
  fetch('api/mesa/'+idmesa+'/puntaje/'+idusuario,{
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(data)
  }).then(response=>{
    getPuntajes();
  }).catch(error => console.log(error));
}
function getMensajes(){
  fetch('api/mesa/'+idmesa+'/chat')
    .then(response=>response.json())
    .then(mensajes=>{
      if (chat.invertido) {
        let aux = [];
        let j=0;
        for (let i = mensajes.length-1; i >= 0; i--) {
          aux[j] = mensajes[i];
          j++;
        }
        mensajes=aux;
      }
      chat.mensajes=mensajes;
    }).then(function(){
      mensajeDeleteButton();
    }).catch(error => console.log(error));
}
function addMensaje(){
  let mensaje = document.querySelector('input.mensaje').value;
  let data = {
    mensaje: mensaje
  }
  fetch('api/mesa/'+idmesa+'/chat/'+idusuario,{
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(data)
  }).then(response => {
    getMensajes();
  }).catch(error => console.log(error));
}
function deletMensaje(id){
  fetch('api/chat/'+id,{
    method: 'DELETE'
  }).then( response => {
    getMensajes();
  })
}
function mensajeDeleteButton(){
  let mensajes = document.querySelectorAll('a.mensaje');
  for (let i = 0; i < mensajes.length; i++) {
    mensajes[i].addEventListener("click",function(event){
      event.preventDefault();
      deletMensaje(mensajes[i].id);
    })
  }
}
window.onload = function(){
  let enviamensaje = document.querySelector('button.mensaje');
  enviamensaje.addEventListener("click",function() {
    addMensaje();
  });
  let invertir = document.querySelector('button#invertir');
  invertir.addEventListener("click",function() {
    invertirOrden();
  });
  let botonpuntaje = document.querySelector('button.puntaje');
  botonpuntaje.addEventListener("click",function() {
    addPuntaje();
  });
  getPuntajes();
  getMensajes();
}
