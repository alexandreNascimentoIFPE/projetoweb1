function getClass(id) {
    console.log();
    var option = document.getElementById(id);
    option.classList.add("active");

    var elemento = document.querySelectorAll("a.active");
    for (let index = 0; index < elemento.length; index++) {
        if (elemento[index].id != id) {
            elemento[index].classList.remove("active");
        }  
    }   
}
