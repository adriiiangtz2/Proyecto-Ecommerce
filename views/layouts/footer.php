<?php

use yii\bootstrap4\Html;

?>
<!-- footer -->
<div class="Footer">
        <div class="contenedor">
            <div class="filas">
                <div class="footer-colum-1">
                    <h3>Download our app</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis a, eos magni labore reiciendis
                        minus nobis minima aperiam ipsa</p>
                    <div class="app-logo">
                    <?= Html::img('plantilla/images/play-store.png', ['class' => 'logo']) ?>
                    <?= Html::img('plantilla/images/app-store.png', ['class' => 'logo']) ?>
                    </div>
                </div>
                <div class="footer-colum-2">
                <?= Html::img('plantilla/images/logo-white.png', ['class' => 'logo']) ?>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis a, eos magni labore reiciendis
                        minus nobis minima aperiam ipsa</p>
                </div>

                <div class="footer-colum-3">
                    <h3>useful links</h3>
                    <ul>
                        <li>cupons</li>
                        <li>blog post</li>
                        <li>return</li>
                        <li>join affiliate</li>
                    </ul>
                </div>

                <div class="footer-colum-4">
                    <h3>follow me</h3>
                    <ul>
                        <li>facebook</li>
                        <li>twiter</li>
                        <li>instagram</li>
                        <li>you tube</li>
                    </ul>
                </div>


            </div>
            <hr>
            <p class="copyright"> copyright 2021 - &copy; adrian gutierrez</p>

        </div>
    </div>