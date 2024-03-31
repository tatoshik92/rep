<?
use app\assets\AcpAsset;
use yii\bootstrap4\Html;
AcpAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<!--begin::Head-->
<head>
    <base href="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php
    $system_config = \app\models\Config::getValues();
    ?>

    <style>
        :root {
            --main-primary: <?=$system_config['css_color_primary']?>;
            --main-primary-active: <?=$system_config['css_color_primary-active']?>;
            --main-primary-light: <?=$system_config['css_color_primary-light']?>;
        }
    </style>


    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>



<main role="main" class="d-flex w-100 h-100">
    <?=$content?>
</main>



<script>var hostUrl = "/panel_assets/";</script>

<? if(!empty($system_config['support_wa'])){?>
    <a class="button_whatsapp" target="_blank" href="<?=$system_config['support_wa']?>"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDY4MiA2ODIuNjY2NjkiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTU0NC4zODY3MTkgOTMuMDA3ODEyYy01OS44NzUtNTkuOTQ1MzEyLTEzOS41MDM5MDctOTIuOTcyNjU1OC0yMjQuMzM1OTM4LTkzLjAwNzgxMi0xNzQuODA0Njg3IDAtMzE3LjA3MDMxMiAxNDIuMjYxNzE5LTMxNy4xNDA2MjUgMzE3LjExMzI4MS0uMDIzNDM3IDU1Ljg5NDUzMSAxNC41NzgxMjUgMTEwLjQ1NzAzMSA0Mi4zMzIwMzIgMTU4LjU1MDc4MWwtNDQuOTkyMTg4IDE2NC4zMzU5MzggMTY4LjEyMTA5NC00NC4xMDE1NjJjNDYuMzI0MjE4IDI1LjI2OTUzMSA5OC40NzY1NjIgMzguNTg1OTM3IDE1MS41NTA3ODEgMzguNjAxNTYyaC4xMzI4MTNjMTc0Ljc4NTE1NiAwIDMxNy4wNjY0MDYtMTQyLjI3MzQzOCAzMTcuMTMyODEyLTMxNy4xMzI4MTIuMDM1MTU2LTg0Ljc0MjE4OC0zMi45MjE4NzUtMTY0LjQxNzk2OS05Mi44MDA3ODEtMjI0LjM1OTM3NnptLTIyNC4zMzU5MzggNDg3LjkzMzU5NGgtLjEwOTM3NWMtNDcuMjk2ODc1LS4wMTk1MzEtOTMuNjgzNTk0LTEyLjczMDQ2OC0xMzQuMTYwMTU2LTM2Ljc0MjE4N2wtOS42MjEwOTQtNS43MTQ4NDQtOTkuNzY1NjI1IDI2LjE3MTg3NSAyNi42Mjg5MDctOTcuMjY5NTMxLTYuMjY5NTMyLTkuOTcyNjU3Yy0yNi4zODY3MTgtNDEuOTY4NzUtNDAuMzIwMzEyLTkwLjQ3NjU2Mi00MC4yOTY4NzUtMTQwLjI4MTI1LjA1NDY4OC0xNDUuMzMyMDMxIDExOC4zMDQ2ODgtMjYzLjU3MDMxMiAyNjMuNjk5MjE5LTI2My41NzAzMTIgNzAuNDA2MjUuMDIzNDM4IDEzNi41ODk4NDQgMjcuNDc2NTYyIDE4Ni4zNTU0NjkgNzcuMzAwNzgxczc3LjE1NjI1IDExNi4wNTA3ODEgNzcuMTMyODEyIDE4Ni40ODQzNzVjLS4wNjI1IDE0NS4zNDM3NS0xMTguMzA0Njg3IDI2My41OTM3NS0yNjMuNTkzNzUgMjYzLjU5Mzc1em0xNDQuNTg1OTM4LTE5Ny40MTc5NjhjLTcuOTIxODc1LTMuOTY4NzUtNDYuODgyODEzLTIzLjEzMjgxMy01NC4xNDg0MzgtMjUuNzgxMjUtNy4yNTc4MTItMi42NDQ1MzItMTIuNTQ2ODc1LTMuOTYwOTM4LTE3LjgyNDIxOSAzLjk2ODc1LTUuMjg1MTU2IDcuOTI5Njg3LTIwLjQ2ODc1IDI1Ljc4MTI1LTI1LjA5Mzc1IDMxLjA2NjQwNi00LjYyNSA1LjI4OTA2Mi05LjI0MjE4NyA1Ljk1MzEyNS0xNy4xNjc5NjggMS45ODQzNzUtNy45MjU3ODItMy45NjQ4NDQtMzMuNDU3MDMyLTEyLjMzNTkzOC02My43MjY1NjMtMzkuMzMyMDMxLTIzLjU1NDY4Ny0yMS4wMTE3MTktMzkuNDU3MDMxLTQ2Ljk2MDkzOC00NC4wODIwMzEtNTQuODkwNjI2LTQuNjE3MTg4LTcuOTM3NS0uMDM5MDYyLTExLjgxMjUgMy40NzY1NjItMTYuMTcxODc0IDguNTc4MTI2LTEwLjY1MjM0NCAxNy4xNjc5NjktMjEuODIwMzEzIDE5LjgwODU5NC0yNy4xMDU0NjkgMi42NDQ1MzItNS4yODkwNjMgMS4zMjAzMTMtOS45MTc5NjktLjY2NDA2Mi0xMy44ODI4MTMtMS45NzY1NjMtMy45NjQ4NDQtMTcuODI0MjE5LTQyLjk2ODc1LTI0LjQyNTc4Mi01OC44Mzk4NDQtNi40Mzc1LTE1LjQ0NTMxMi0xMi45NjQ4NDMtMTMuMzU5Mzc0LTE3LjgzMjAzMS0xMy42MDE1NjItNC42MTcxODctLjIzMDQ2OS05LjkwMjM0My0uMjc3MzQ0LTE1LjE4NzUtLjI3NzM0NC01LjI4MTI1IDAtMTMuODY3MTg3IDEuOTgwNDY5LTIxLjEzMjgxMiA5LjkxNzk2OS03LjI2MTcxOSA3LjkzMzU5NC0yNy43MzA0NjkgMjcuMTAxNTYzLTI3LjczMDQ2OSA2Ni4xMDU0NjlzMjguMzk0NTMxIDc2LjY4MzU5NCAzMi4zNTU0NjkgODEuOTcyNjU2YzMuOTYwOTM3IDUuMjg5MDYyIDU1Ljg3ODkwNiA4NS4zMjgxMjUgMTM1LjM2NzE4NyAxMTkuNjQ4NDM4IDE4LjkwNjI1IDguMTcxODc0IDMzLjY2NDA2MyAxMy4wNDI5NjggNDUuMTc1NzgyIDE2LjY5NTMxMiAxOC45ODQzNzQgNi4wMzEyNSAzNi4yNTM5MDYgNS4xNzk2ODggNDkuOTEwMTU2IDMuMTQwNjI1IDE1LjIyNjU2Mi0yLjI3NzM0NCA0Ni44Nzg5MDYtMTkuMTcxODc1IDUzLjQ4ODI4MS0zNy42Nzk2ODcgNi42MDE1NjMtMTguNTExNzE5IDYuNjAxNTYzLTM0LjM3NSA0LjYxNzE4Ny0zNy42ODM1OTQtMS45NzY1NjItMy4zMDQ2ODgtNy4yNjE3MTgtNS4yODUxNTYtMTUuMTgzNTkzLTkuMjUzOTA2em0wIDAiIGZpbGwtcnVsZT0iZXZlbm9kZCIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9IiI+PC9wYXRoPjwvZz48L3N2Zz4="></a>
<?}?>

<?php $this->endBody() ?>

<style>
    .symbol > img{
        object-fit: contain;
    }
</style>
</body>

</html>
<?php $this->endPage() ?>