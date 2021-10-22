// boton btnfav
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
// boton btnfavpro
function favoritoIcon(id){
    // guarda los datos que contenga este id 
// let nav = $("#icon-fav"+id).val();
$.post('/cat-favorito/btnfavpro', {id: id}, function(data){
    console.log('click');


    if(data){
        $('#identificador'+id).html(data.html);
        console.log('hola');
    }
}); 
};

