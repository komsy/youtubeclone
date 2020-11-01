<?php
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Nav;

?>
  <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options'=>[
            'class'=>'shadow-sm navbar navbar-expand-lg navbar-light bg-light'
        ]
    ]);
    $menuItems = [
        ['label' => 'Create', 'url' => ['/videos/create']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Logout('.Yii::$app->user->identity->username.')',
            'url'=>['site/logout'],
            'linkOptions'=>[
                'data-method'=>'post'
            ]
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>