<div><h3><b>DATOS DE ACCESO</b></h3></div>
        <p><b>USERNAME</b><br><?= $user->username ?></p><br>
        <p><b>CONTRASEÑA</b><br><?= $user->auth_key ?></p><br>
        <p><b>CORREO ELECTRONICO</b><br><?= $user->email ?></p><br>
        <button class="editar-btn-tarjeta" data-toggle="modal" data-target="#exampleModal" onclick="modalacceso(<?= $user->id ?>)">Editar <i class="far fa-edit"></i></button> 
        