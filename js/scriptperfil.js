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
function showAvatars(){
  let botonavatars = document.querySelector("button.avatars");
  let avatars = document.querySelector("div.avatars");
  hideElemEvent(botonavatars,avatars);
}
function addAvatar() {
  let data= {

  }
  fetch('api/addavatar', {
       method: 'POST',
       headers: {'Content-Type': 'application/json'},
       body: JSON.stringify(data)
    })
    .then(response => {
        getAvatars();
    })
    .catch(error => console.log(error));

}
function getAvatars() {
  fetch("api/getavatars")
    .then(response => response.json())
    .then(avatars => {
      app.avatars = avatars;
    }).then(function(){
      selectAvatar();
    }).catch(error => console.log(error));
}
function setAvatar(idavatar) {
  fetch("api/setavatar/"+idavatar,{
    method: 'PUT'
  })
  .then(response => {
      changeAvatar();
  })
  .catch(error => console.log(error));
}
function changeAvatar(){
  fetch("api/getavatar")
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
window.onload = function(){
  showAvatars();
  getAvatars();
  changeAvatar();
}
