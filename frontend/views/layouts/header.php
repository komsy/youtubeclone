<?php


/** @var $channel \common\models\user */
use yii\helpers\Url;
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
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup <i class="fas fa-user-plus"></i>', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login <i class="fas fa-sign-in-alt"></i>', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Logout <i class="fas fa-sign-out-alt"></i> ('.Yii::$app->user->identity->username.')',
            'url'=>['site/logout'],
            'linkOptions'=>[
                'data-method'=>'post'
            ]
        ];
    }
?>
<form action="<?=Url::to(['/video/search' ]) ?>" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" value="<?=Yii::$app->request->get('keyword') ?>">

    <button class="btn btn-outline-success my-2 my-sm-0"> Search </button>

</form>

<?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
          'encodeLabels'=>false,
    ]);
    NavBar::end();
    ?>