// ! Vista para ver la informacion de cuenta del usuario
<?php
use app\models\Usuario;
use yii\bootstrap4\Html;
// TODO funcion de usuario registrado
$usuario = Usuario::usuario();
// * Se accede a la info de la tabla wevimark por el fk
$user = $usuario->usuFkuser;
?>
<div id ="">
    <div id="titulo-usu"style="TEXT-ALIGN: center;">
    //! Se renderiza el contenedor de titulo
    <?= $this->render('titulo', compact('usuario')) ?> 
    </div>
    <h3><b>MIS DATOS</b></h3>
    <p>Modifica tus datos personales a continuación para que tu cuenta esté actualizada.</p>
    <div class="row" >
         <!-- segundo contenedor -->
        <div id="mostrardatos" class="col-md-5"  style="border:1px DASHED black;margin:5px;padding:10px;">
       //! Se renderiza el contenedor de informacion datos del usuario
        <?= $this->render('info-datos', compact('usuario')) ?> 
        </div>
        //! Se renderiza el MODAL de informacion datos 
        <?= $this->render('editardatos', compact('usuario')) ?> 

        <!-- tercer contenedor -->
    <div id="mostrardatos2" class="col-md-5" style="border:1px DASHED black;margin:5px;padding:10px;">
    //! Se renderiza el contenedor de informacion de login
    <?= $this->render('info-acceso', compact('user')) ?> 
    </div>
    //! Se renderiza el Modal de informacion de login
    <?= $this->render('editaracceso', compact('user')) ?> 


    <div class="col-md-5" style="border:1px DASHED black;margin:5px;padding:10px;">
        <div><h3><b>CERRAR SESIÓN EN TODOS LOS NAVEGADORES</b></h3></div>
        <p>Al elegir esta opción, se cerrará tu sesión en todos los navegadores web que hayas utilizado para acceder a la página web de adidas. Para volver a iniciar sesión, tendrás que ingresar tus credenciales.</p>
        // ? en proceso
        <button class="botonCambiar-usuario">Cerrar sesion</button><br><br>
        <p><b>GESTIONAR CUENTA</b></p><br>
       // ?  falta mandar una alerta al momento de eliminar la cuenta  -->
       // * Usuario/estatus es el nombre del action del controlador
        <?= Html::a('Eliminar cuenta', ['/usuario/estatus'], ['class' => 'botonCambiar-usuario btn-warning']) ?>
    </div>
</div>
<br>
<h3><b>¿NECESITAS AYUDA?</b></h3>
</div>
