<!-- MODEL EMERGENTE BOOSTRAP -->
<div id="ventana-modal<?=$tarjeta->tar_id?>" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#9da2cc3b;">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar metodo de pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- CONTENIDO PRINCIPAL -->
       <div class="row" style="height:200px">

       
<div class="col-md-4">
    Metodo de pago
</div>
<div class="col-md-4">
    Nombre de la tarjeta
</div>
<div class="col-md-4">
    Fecha de caducidad
</div>
</div>
       <!-- TERMINA CONTENIDO PRINCIPAL -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>