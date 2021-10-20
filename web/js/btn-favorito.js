
function favoritos(id){
    // var div = $('#seguimiento-seg_fkdivision').val();
    var es = $('#catfavorito-fav_estado').val();
    console.log(es);
    console.log(id);

    $.post('/cat-favorito/btnfav', {id: id, es: es}, function(data){
        console.log(id);
        console.log(es);
        console.log('hola');
    

        if(data){
            $('#identificador').html(data.html);
            console.log('hola');
        }
    }); 
};

// guarda los datos que contenga este id 
// let nav = $("#icon-fav");
// // console.log(nav);
// //Esta accion hace cambiar la clase al boton , icono de fontawesone
// nav.on('click', function() {
//     // hasClass si contiene la clase ( " -- ") = true o false
//     if (nav.hasClass("far")){
//         // remueve la clase ( " -- ")
//         nav.removeClass("far");
//         // e insertale la clase ( " -- ")
//         nav.addClass("fas");
//         // de lo contrario
//     } else {
//           // remueve la clase ( " -- ")
//         nav.removeClass("fas");
//          // e insertale la clase ( " -- ")
//         nav.addClass("far");
//     }
// });

// function favoritos(){
// console.log('click');
// console.log(nav);
// };

