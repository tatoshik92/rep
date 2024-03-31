<?php

/** @var yii\web\View $this */

$this->title = Yii::$app->t->getT('acp_login_page_title','Login');
?>

<div class="m-auto w-400px mw-400px">
    <form action="" method="POST" class="p-10">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <h1 class="text-center mb-10"><?=Yii::$app->t->getT('acp_login_title','Login');?></h1>
        <? if(empty($user)){?>
        <div class="mb-10">
            <label class="form-label"><?=Yii::$app->t->getT('acp_login_user_id','User ID');?></label>
            <input type="text" name="id" class="form-control form-control-solid" placeholder="<?=Yii::$app->t->getT('acp_login_user_id_placeholder','You ID');?>">
        </div>
        <?}?>

        <div class="mb-10">
            <label class="form-label"><?=Yii::$app->t->getT('acp_login_user_password','Password');?></label>
            <input type="password" name="password" class="form-control form-control-solid" placeholder="<?=Yii::$app->t->getT('acp_login_user_password_placeholder','You password');?>">
        </div>

        <button type="submit" class="btn btn-primary"><?=Yii::$app->t->getT('acp_login_submit_form','Login');?></button>
    </form>
</div>
