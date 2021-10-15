
  <?php use yii\bootstrap4\Html; ?>
<!-- INICIO DE LA CABECERA  -->
<div class="header">
        <!-- contenedor general -->
        <div class="contenedor">

            <!-- contenedor logo y menu -->
            <div class="barra">
                <div class="logo">
                   <a href="index.html"><?= Html::img(
                       '/plantilla/images/logo.png',
                       ['class' => 'logo', 'style' => 'width:125px;']
                   ) ?></a> 
                </div>
                <nav>
                    <!-- se le coloca una id-->
                    <ul id="menuItems">
                        <li><a href="/site/principal">Home</a></li>
                        <li><a href="/cat-favorito/favorito">Favoritos</a></li>
                        <li><a href="/layouts/usuario/productos">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="account.html">Account</a></li>
                        <li><a href="/user-management/auth/logout">cerrar Sesion</a></li>
                    </ul>
                </nav>
               <a href="card.html"><?= Html::img('/plantilla/images/cart.png', [
                   'class' => 'logo',
                   'style' => 'width:30px; height:30px',
               ]) ?></a> 
                <!-- se le coloca una accion al menu un evento -->
                <img src="images/menu.png" width="30px" height="30px" class="menu-icon" onclick="menutoggle()">
            </div>
            <!-- termina contenedor logo y menu -->

        </div>
        <!-- ----TERMINA EL CONTENEDOR CENTRAL ----- -->