"use strict"
let app = new Vue({
  el: "div.avatars",
  data: {
    avatars: [],
    auth: true
  }
});
let avatarprofile = new Vue({
  el: "img#useravatar",
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
    }).catch(error => console.log(error));
}
function setAvatar(idavatar) {
  let data={
    id_avatar:idavatar
  }
  fetch("api/setavatar",{
    method: 'PUT',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(data)
  })
  .then(response => {
      changeAvatar();
  })
  .catch(error => console.log(error));
}
function changeAvatar(){
  fetch("api/getavatar")
  .then(response => response.json())
  .then(avatarprofile => {
    avatarprofile.avatar = avatarprofile;
  }).catch(error => console.log(error));
}
function selectAvatar() {
  let avatars=document.querySelectorAll('a.avatar');
  for  (let i=0;i<avatars.lenght;i++) {
    avatars[i].addEventListener("click",function(){
      setAvatar(avatars[i].id);
  });
  }
}
window.onload = function(){
  showAvatars();
  getAvatars();
  changeAvatar();
}
