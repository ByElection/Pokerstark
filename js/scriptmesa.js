function cambiaLabel(num){
    let idform = "#form"+num;
    let label = document.querySelector(idform+" label");
    let range = document.querySelector(idform+" input");
    label.innerHTML=range.value;
}