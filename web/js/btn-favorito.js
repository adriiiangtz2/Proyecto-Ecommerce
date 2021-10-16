
// guarda los datos que contenga este id 
let nav = $("#icon-fav");
console.log(nav);
//Esta accion hace cambiar la clase al boton , icono de fontawesone
nav.on('click', function(e) {
    // hasClass si contiene la clase ( " -- ") = true o false
    if (nav.hasClass("far")){
        // remueve la clase ( " -- ")
        nav.removeClass("far");
        // e insertale la clase ( " -- ")
        nav.addClass("fas");
        // de lo contrario
    } else {
          // remueve la clase ( " -- ")
        nav.removeClass("fas");
         // e insertale la clase ( " -- ")
        nav.addClass("far");
    }
});

