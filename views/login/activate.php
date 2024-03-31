<div class="m-auto w-400px mw-400px">
    <form action="" method="POST" class="p-10">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

        <? if(!empty($user->company) and !empty($user->company->logo->src)){?>
            <div class="text-center mb-5"><img src="<?=$user->company->logo->src?>" class="mw-100 mh-100px"></div>
        <?}?>

        <h1 class="text-center mb-10"><?=Yii::$app->t->getT('acp_login_title_activate','Profile activation');?></h1>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-floating  tt-form-floating-icon mb-5">
                    <input type="text" name="firstName" class="form-control tt-shadow-sm" value="<?=$user->firstName?>" required id="firstName" placeholder="<?=Yii::$app->t->getT('acp_login_title_activate_firstname','First name');?>"/>
                    <label for="firstName"><?=Yii::$app->t->getT('acp_login_title_activate_firstname','First Name');?></label>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-floating  tt-form-floating-icon mb-5">
                    <input type="text" name="lastName" class="form-control tt-shadow-sm" value="<?=$user->lastName?>" required id="lastName" placeholder="<?=Yii::$app->t->getT('acp_login_title_activate_lastname','Last name');?>"/>
                    <label for="firstName"><?=Yii::$app->t->getT('acp_login_title_activate_lastname','Last Name');?></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-floating  tt-form-floating-icon mb-5">
                    <input type="email" name="email" class="form-control tt-shadow-sm" value="" required id="email" placeholder="<?=Yii::$app->t->getT('acp_login_title_activate_email','Email');?>"/>
                    <label for="email"><?=Yii::$app->t->getT('acp_login_title_activate_email','Email');?></label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-floating  tt-form-floating-icon mb-5">
                    <input type="password" name="password" class="form-control tt-shadow-sm" value="" required id="password" placeholder="<?=Yii::$app->t->getT('acp_login_title_activate_password','Set a login password');?>"/>
                    <label for="password"><?=Yii::$app->t->getT('acp_login_title_activate_password','Set a login password');?></label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100"><?=Yii::$app->t->getT('acp_login_title_activate_submit','Activate');?></button>
    </form>
</div>