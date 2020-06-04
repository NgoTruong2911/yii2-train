<?php

use yii\grid\GridView;

?>

<div class="wrap">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            'author',     
        ],
    ]) ?>
</div>
