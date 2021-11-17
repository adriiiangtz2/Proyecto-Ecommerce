// TODO  -------------------------CAMBIAR LAS CLASES DE MOSTRAR------------------------ */
function mostrarfiltro(id) {
    console.log(id);
    btnfiltro = document.querySelector("#btn-filro-"+id);
    btnfiltro.classList.toggle("active");
    if ($('#filtros-'+id).hasClass("mostrar-filtro")) {
        $('#filtros-'+id).removeClass("mostrar-filtro").addClass("mostrar-filtro2");
    } else if ($('#filtros-'+id).hasClass("mostrar-filtro2")) {
        $('#filtros-'+id).removeClass("mostrar-filtro2").addClass("mostrar-filtro");
    }
};