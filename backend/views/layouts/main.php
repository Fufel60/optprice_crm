<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

\backend\assets\AppAsset::register($this);
\backend\assets\AdminLTEAsset::register($this);

$this->title = $this->title." | Панель Управления";

?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue-light sidebar-mini sidebar-collapse">
<?php $this->beginBody(); ?>
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a data-toggle="offcanvas" role="button" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-bars"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg hide-xs">Панель Управления</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-empty">
            <ul class="nav navbar-nav">
                <li class="user user-menu"><a class="dropdown-toggle"><?= !empty($this->params['header']) ? $this->params['header'] : '';  ?></a></li>
            </ul>
        </div>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li><a><?=Yii::$app->user->identity->email?></a></li>
                <li><a href="<?=Url::to(['site/logout'])?>" class="btn btn-sucess">Выйти</a></li>
            </ul>
        </div>
     </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=Menu::widget([
            'encodeLabels' => false,
            'options' => [
                'class' => 'sidebar-menu',
            ],
            'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
            'activateParents' => true,
            'items' => [
                [
                    'label' => '<i class="fa fa-list-alt"></i> <span>Офферы</span>',
                    'url' => ['offer/index'],
                ],
                [
                    'label' => '<i class="fa fa-hourglass-end"></i> <span>Статусы</span>',
                    'url' => ['status/index'],
                ],
                [
                    'label' => '<i class="fa fa-user"></i> <span>Пользователи</span>',
                    'url' => ['user/index'],
                ],
            ],
        ])?>
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if (isset($this->params['header'])) : ?>
        <?php endif; ?>
        <?php if(isset($this->params['breadcrumbs'])) : ?>
        <?=Breadcrumbs::widget([
            'options' => [
                'class' => 'breadcrumb',
            ],
            'encodeLabels' => false,
            'homeLink' => [
                'label' => '<i class="fa fa-dashboard"></i> Главная',
                'url' => ['/site/index'],
            ],
            'links' => $this->params['breadcrumbs'],
        ])?>
        <?php endif; ?>
    </section>

        <?php
            if (isset($this->params['toolbar']))
            {
                echo '<div class="content-header">';
                foreach($this->params['toolbar'] as $button)
                {
                    echo $button."&nbsp;&nbsp;";
                }
                echo '</div>';
            }
        ?>
    <!-- Main content -->
    <section class="content">
    <?php
    if (count(Yii::$app->session->getAllFlashes())) 
    {    
        foreach (Yii::$app->session->getAllFlashes() as $key => $messages)
        {
            foreach($messages as $message)
            {
                echo '<div class="callout callout-' . $key . '"><p>' . \yii::t('app', $message) . '</p></div>';
            }
        }
    }
    ?>
            <?=$content?>
    </section>
</div>
</div>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
