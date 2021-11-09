// boton btnfav
function favoritos(id,estado){
    //le coloca la clase  el preloader
    $(`#lds-facebook_${id}`).removeClass("nada").addClass("lds-facebook");
    //le coloca un un fondo rojo
    $("#contendor-fav"+id).css("background", "#ffb0b078");
    console.log(es);
    if (estado==1){
        $("#icon-fav1"+id).css("transform", "scale(1.2) rotate(-20deg)");
    }else{
        $("#icon-fav1"+id).css("transform", "rotate(20deg)");
        $("#icon-fav1"+id).addClass("fas fa-heart-broken");
    }
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
function favoritoIcon(id,es){
    // guarda los datos que contenga este id 
    // let nav = $("#icon-fav"+id).val();
    const Estado0 =0;
    console.log(es);
    if (Estado0==es){
        $("#icon-fav"+id).addClass("fas fa-heart");
        // $("#icon-fav"+id).css("transform", "scale(1.3) rotate(-20deg)");
        $("#icon-fav"+id).css("transform", "scale(1.3)");
    }else{
        $("#icon-fav"+id).css("transform", "scale(1.2) rotate(20deg)");
        $("#icon-fav"+id).addClass("fas fa-heart-broken");
    }
    $.post('/cat-favorito/btnfavpro', {id: id}, function(data){
        console.log('click');
        if(data){
            $('#identificador'+id).html(data.html);
            console.log('hola');
        }
    }); 
};

