<?php

use yii\widgets\ListView;

?>

<?=
ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'tag' => 'div',
        'class' => 'row',
        'id' => 'list-wrapper',
    ],
    'itemView' => 'productoitem',
    'itemOptions' => [
        'tag' => false,
    ],
    'layout' => "<div class='col-md-12'>{summary}</div>{items}<div class='col-md-12'>{pager}</div>",
]);
?>