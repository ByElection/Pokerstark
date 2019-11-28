"use strict"
let app = new Vue({
  el: "div.avatars",
  data: {
    avatars: [],
    auth: true
  }
});
let avatarprofile = new Vue({
  el: "div#useravatar",
  data: {
    avatar: []
  }
});
let idusuario = document.querySelector('div.fantasmin').id;
function showAvatars(){
  let botonavatars = document.querySelector("button.avatars");
  let avatars = document.querySelector("div.avatars");
  hideElemEvent(botonavatars,avatars);
}
function addAvatar() {
  let form= new FormData(document.querySelector('form#addavatar'));
  fetch('addavatar', {
       method: 'POST',
       body: form
    })
    .then(response => {
        getAvatars();
    })
    .catch(error => console.log(error));
}
function deletAvatar(idavatar) {
  fetch('api/avatar/'+idavatar,{
    method: 'DELETE'
  })
  .then(response=>{
    getAvatars();
  })
}
function getAvatars() {
  fetch("api/avatars")
    .then(response => response.json())
    .then(avatars => {
      app.avatars = avatars;
    }).then(function(){
      selectAvatar();
      selectAvatarD();
    }).catch(error => console.log(error));
}
function setAvatar(idavatar) {
  fetch('api/usuario/'+idusuario+'/avatar/'+idavatar,{
    method: 'PUT'
  })
  .then(response => {
      changeAvatar();
  })
  .catch(error => console.log(error));
}
function changeAvatar(){
  fetch('api/usuario/'+idusuario+'/avatar')
  .then(response => response.json())
  .then(avatarper => {
    avatarprofile.avatar = avatarper;
  }).catch(error => console.log(error));
}
function selectAvatar() {
  let avatars=document.querySelectorAll('a.avatar');
  for  (let i=0;i<avatars.length;i++) {
    avatars[i].addEventListener("click",function(event){
      event.preventDefault();
      setAvatar(avatars[i].id);
  });
  }
}
function selectAvatarD() {
  let avatars=document.querySelectorAll('button.deletavatar');
  for  (let i=0;i<avatars.length;i++) {
    avatars[i].addEventListener("click",function(event){
      event.preventDefault();
      deletAvatar(avatars[i].id);
    });
  }
}
window.onload = function(){
  showAvatars();
  getAvatars();
  changeAvatar();
  try{
    let addavatar = document.querySelector('button#addavatar');
    addavatar.addEventListener("click",function(){
      addAvatar();
    });
  }catch(error){
    console.log(error);
  }
}
