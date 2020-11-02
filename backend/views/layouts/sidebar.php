<?php
use yii\bootstrap4\Nav;

?>
<aside class="shadow-sm">
	<?php
    echo Nav::widget([
        'options' => [
            'class' => 'd-flex flex-column nav-pills'
        ],

        'encodeLabels'=>false,

        'items' => [
            [
                'label'=>'<i class="fas fa-tachometer-alt"></i> Dashboard',
                'url'=>['/site/index']
            ],
            [
                'label'=>'<i class="fas fa-video-slash"></i> Videos',
                'url'=>['/videos/index']
            ]
        ]
    ]);
    
    ?>
</aside>

