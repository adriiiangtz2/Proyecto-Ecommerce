<?php 
use app\models\Usuario;
$usuario = Usuario::usuario();
?>
<div>

    <div style="TEXT-ALIGN: center;">
    <h3 style="text-transform: uppercase;"><b>hola <?=$usua->usu_nombre?></b></h3>
    </div>
    <h3><b>MIS DATOS</b></h3>
    <p>Modifica tus datos personales a continuación para que tu cuenta esté actualizada.</p>
    <div class="row">
        <div class="col-md-5" style="border:1px DASHED black;margin:5px;padding:10px;">
        <div><h3><b>DATOS</b></h3></div>
        <p><b>Nombre</b><br><?=$usuario->nombreCompleto?></p><br>
        <p><b>Nacimiento</b><br> </p><br>
        <p><b>Genero</b><br> </p><br>
        <button>Editar</button> 
    </div>
    
    <div class="col-md-5" style="border:1px DASHED black;margin:5px;padding:10px;">
        <div><h3><b>DATOS DE ACCESO</b></h3></div>
        <p><b>USERNAME</b><br><?=$usuario->userUsername?></p><br>
        <p><b>CORREO ELECTRONICO</b><br><?=$usuario->userEmail?></p><br>
        <button>Editar</button> 
        
    </div>
    <div class="col-md-5" style="border:1px DASHED black;margin:5px;padding:10px;">
        <div><h3><b>CERRAR SESIÓN EN TODOS LOS NAVEGADORES</b></h3></div>
        <p>Al elegir esta opción, se cerrará tu sesión en todos los navegadores web que hayas utilizado para acceder a la página web de adidas. Para volver a iniciar sesión, tendrás que ingresar tus credenciales.</p>
        <button>Cerrar sesion</button><br><br>
        <p><b>GESTIONAR CUENTA</b></p><br>
        <button>Eliminar cuenta</button> 
    </div>


</div>
<br>
  <h3><b>¿NECESITAS AYUDA?</b></h3>

</div>