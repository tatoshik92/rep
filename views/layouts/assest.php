<?php
use app\assets\AssetsAsset;
use yii\bootstrap4\Html;
AssetsAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->t->lang['code_doctype_html']?>" dir="<?=Yii::$app->t->lang['dir']?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="dark">
<?php $this->beginBody() ?>
    <?=$content?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
