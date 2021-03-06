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
                'label'=>'<i class="fas fa-home"> </i> Home',
                'url'=>['/video/index']
            ],
            [
                'label'=>'<i class="fas fa-history"> </i> History',
                'url'=>['/video/history']
            ]
        ]
    ]);
    
    ?>
</aside>

