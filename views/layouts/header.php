<?php

use yii\bootstrap4\Html;

?>
<!-- INICIO DE LA CABECERA  -->
<div class="header">
        <!-- contenedor general -->
        <div class="contenedor">

            <!-- contenedor logo y menu -->
            <div class="barra">
                <div class="logo">
                   <a href="index.html"><?= Html::img('plantilla/images/logo.png', ['class' => 'logo', 'style'=>'width:125px;']) ?></a> 
                </div>
                <nav>
                    <!-- se le coloca una id-->
                    <ul id="menuItems">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="productos.html">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="account.html">Account</a></li>
                    </ul>
                </nav>
               <a href="card.html"><?= Html::img('plantilla/images/cart.png', ['class' => 'logo', 'style'=>'width:30px; height:30px'])?></a> 
                <!-- se le coloca una accion al menu un evento -->
                <img src="images/menu.png" width="30px" height="30px" class="menu-icon" onclick="menutoggle()">
            </div>
            <!-- termina contenedor logo y menu -->


            <div class="filas">
                <div class="colum-2">
                    <h1>Lorem ipsuonsectetur<br> adipisicing elit.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis saepe numquam molestias ipsa
                        quis, recusandae totam doloremque</p>
                    <!-- &#187 flecha -->
                    <a href="#" class="btn">Explore now &#187</a>
                </div>
                <div class="colum-2">
                <?= Html::img('plantilla/images/image1.png', ['class' => 'logo', 'style'=>'width:480px;']) ?>
                </div>

            </div>

        </div>
        <!-- ----TERMINA EL CONTENEDOR CENTRAL ----- -->
    </div>