<?php
Yii::$app->params['h1'] = 'Card generation';

?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

    <div class="mw-300px">


        <div class="form-floating  tt-form-floating-icon mb-5 mt-10">
            <input type="text" name="count" class="form-control tt-shadow-sm" value="" id="cardCount" placeholder="Count card">
            <label for="colorPC">Count card</label>
        </div>

        <div class="mt-10">
            <div class="form-label">Company</div>
            <select class="form-select  mb-5 tt-shadow-sm" name="company_id" data-control="select2" data-placeholder="Select company">
                <option></option>
                <option value="0">Without company</option>
                <?php
                $comps = \app\models\Company::find()->all();
                foreach ($comps as $comp){
                    ?>
                    <option value="<?=$comp->id?>"><?=$comp->name?></option>
                    <?
                }
                ?>
            </select>
        </div>


        <div class="d-flex flex-stack mt-10">
            <!--begin::Label-->
            <div class="me-5">
                <label class="fs-6 fw-bold form-label">Profile not activated</label>
                <div class="fs-7 fw-bold text-muted">If this box is checked, then the first time you open the profile, you will be prompted to activate the profile</div>
            </div>
            <!--end::Label-->

            <!--begin::Switch-->
            <label class="form-check form-switch form-check-custom form-check-solid">
                <input class="form-check-input" name="isActivated" type="checkbox" value="N" <?if($user->isActivated === 'N'){?>checked="checked"<?}?>/>
                <span class="form-check-label fw-bold text-muted"></span>
            </label>
            <!--end::Switch-->
        </div>




        <button type="submit" class="btn btn-primary mt-10">Generate</button>

    </div>
</form>