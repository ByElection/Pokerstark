function hideElemEvent(boton,elemento) {
  boton.addEventListener("click",function(){
    if (elemento.style.display == "none" || elemento.style.display == ""){
      elemento.setAttribute("style","display:block");
    }else{
      elemento.setAttribute("style","display:none");
    }
  })
}
