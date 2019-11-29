"use strict"
let mesavue = new Vue({
  el: "div.sillas",
  data:{
    jugadores:[],
    mesa:{},
    usuariologeado:{}
  }
});
function cambiaLabel(num){
    let idform = "#form"+num;
    let label = document.querySelector(idform+" label");
    let range = document.querySelector(idform+" input");
    label.innerHTML=range.value;
}
function getJugadoresMesa() {
  fetch('api/mesa/'+idmesa+'/jugadores')
    .then(response=>response.json())
    .then(jugadores=>{
      mesavue.jugadores=jugadores;
    }).then(function() {
      addEvents();
    }).catch(error => console.log(error));
}
function getMesa(){
  fetch('api/mesa/'+idmesa)
    .then(response=>response.json())
    .then(mesa=>{
      mesavue.mesa=mesa;
    }).then(function() {
      getJugadoresMesa()
    }).catch(error => console.log(error));
}
function sentarse(idsilla,fichas) {
  fetch('api/mesa/'+idmesa+'/usuario/'+idusuario+'/sentarse/'+idsilla+'/fichas/'+fichas,{
    method: 'POST'
  }).then(response=>{
    getJugadoresMesa();
  }).catch(error => console.log(error));
}
function pararse() {
  fetch('api/usuario/'+idusuario+'/pararse',{
    method: 'DELETE'
  }).then( response => {
    getJugadoresMesa();
  }).catch(error => console.log(error));
}
function getUsuarioLogeado() {
  fetch('api/usuariologeado')
    .then(response=>response.json())
    .then(usuariologeado=>{
      mesavue.usuariologeado=usuariologeado;
    }).catch(error => console.log(error));
}
function addEvents() {
  let sentarse = document.querySelectorAll("button.sentarse");
  let input = document.querySelectorAll("input[name='checkin']");
  for (var i = 0; i < sentarse.length; i++) {
    sentarse[i].addEventListener("click",function(){
      sentarse(input[i].id,input[i].value);
    })
  }
  let pararse = document.querySelector("button#pararse");
  pararse.addEventListener("click",function(){
    pararse();
  })
}
window.onload = function() {
  getMesa();
}
