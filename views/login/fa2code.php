<?php

/** @var yii\web\View $this */

$this->title = Yii::$app->t->getT('acp_login_page_title','Login');
?>

<div class="m-auto w-400px mw-400px">
    <form action="" method="POST" class="p-10">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <input type="hidden" name="id" value="<?=intval($_POST['id'])?>">
        <input type="hidden" name="password" value="<?=intval($_POST['password'])?>">
        <h1 class="text-center mb-10"><?=Yii::$app->t->getT('acp_login_title','Login');?></h1>
        
        <div class="mb-10">
            <label class="form-label"><?=Yii::$app->t->getT('acp_login_2fa_code','2fa code');?></label>
            <input type="text" name="fa2code" class="form-control form-control-solid" placeholder="<?=Yii::$app->t->getT('acp_login_user_id_secreccode','Secret code');?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary"><?=Yii::$app->t->getT('acp_login_submit_form','Login');?></button>
        </div>
        <? if($user->show2faCode == 1){?>
        <div class="mb-10 text-center">
        <?
            echo $google2fa->getQRCodeInline(
                'Digital cards',
                $user->id,
                $user->google2fa_secret
            );
        ?>
        </div>
        <?}?>
    </form>
</div>
