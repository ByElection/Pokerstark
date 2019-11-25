"use strict"
let chat = new Vue({
  el: "div#chat",
  data: {
    mensajes: []
  }
})
let idmesa = window.location.href.slice(-2);
let idusuario = document.querySelector('div.fantasmin').id;
function getMensajes(){
  fetch('api/mesa/'+idmesa+'/chat')
    .then(response=>response.json())
    .then(mensajes=>{
      chat.mensajes=mensajes;
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
window.onload = function(){
  let enviamensaje = document.querySelector('button.mensaje');
  enviamensaje.addEventListener("click",function() {
    addMensaje();
  })
  getMensajes();
}
