function setAdmin(user){
  fetch('setadmin/'+user,{
    method:'POST'
  })
}
