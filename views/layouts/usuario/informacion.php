<?php use yii\bootstrap4\Html; ?>
<div class="filas">
                <div class="colum-2">
                    <h1>Lorem ipsuonsectetur<br> adipisicing elit.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis saepe numquam molestias ipsa
                        quis, recusandae totam doloremque</p>
                    <!-- &#187 flecha -->
                    <a href="#" class="btn">Explore now &#187</a>
                </div> 
                <div class="colum-2">
                <?= Html::img('/plantilla/images/image1.png', [
                    'class' => 'logo',
                    'style' => 'width:500px;',
                ]) ?>
                </div>
</div>