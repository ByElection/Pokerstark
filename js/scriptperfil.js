"use strict"
let app = new Vue({
  el: "div.avatars",
  data: {
    avatars: [],
    auth: true
  }
});
function showAvatars(){
  let botonavatars = document.querySelector("button.avatars");
  let avatars = document.querySelector("div.avatars");
  hideElemEvent(botonavatars,avatars);
}
function addAvatars() {

}
function getAvatars() {
  fetch("api/getavatars")
    .then(response => response.json())
    .then(avatars => {
      app.avatars = avatars;
    }).catch(error => console.log(error));
}
window.onload = function(){
  showAvatars();
  getAvatars();
}
