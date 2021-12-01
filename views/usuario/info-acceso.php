<!-- // ! Esto es un contenedor  de datos de acceso a cuenta usuario -->
<!-- // ! Se renderiza a informacion , datos llegan por compact -->
<div>
    <h3><b>DATOS DE ACCESO</b></h3>
</div>
<p><b>USERNAME</b><br><?= $user->username ?></p><br>
<!-- // * La contra de weki llega a como se muetra en bd -->
<p><b>CONTRASEÑA</b><br><?php /* $user->auth_key */ ?> ***********</p><br>
<p><b>CORREO ELECTRÓNICO</b><br><?= $user->email ?></p><br>
<!--        // TODO se manda EL id del usuario por onclick -->
<button class="botonCambiar-usuario" data-toggle="modal" data-target="#exampleModal"
    onclick="modalacceso(<?= $user->id ?>)">
    Editar
    <i class="far fa-edit"></i>
</button>