<div><h3><b>DATOS</b></h3></div>
        <p><b>Nombre</b><br><?= $usuario->nombreCompleto ?></p><br>
        <p><b>Nacimiento</b><br> </p><br>
        <p><b>Genero</b><br> </p><br>
        <button  class="editar-btn-tarjeta" data-toggle="modal" data-target="#exampleModal" onclick="modalusu(<?= $usuario->usu_id ?>)">Editar <i class="far fa-edit"></i></button> 