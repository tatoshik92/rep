
<?php
if(empty($company->id)){
    Yii::$app->params['h1'] = 'Create company';
}else{
    Yii::$app->params['h1'] = 'Edit company';
}


$activeLang = Yii::$app->t->getActiveLang();

?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

    <div class="mw-500px">
        <div class="mb-5">
            <!--begin::Image input-->
            <div class="image-input bgi-position-center <?if(!$company->logo->src){?> image-input-empty<?}?>" data-kt-image-input="true" style="background-image: url(/panel_assets/media/svg/avatars/blank.svg)">
                <!--begin::Image preview wrapper-->
                <label for="userPhoto" class="d-block">
                    <div class="image-input-wrapper overflow-hidden w-125px h-125px  bgi-position-center" style="background-image: <?if($company->logo->src){?>url(<?=$company->logo->src?>)<?}else{?>none;<?}?>"></div>
                </label>
                <!--end::Image preview wrapper-->
                <!--begin::Edit button-->
                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                       data-kt-image-input-action="change"
                       data-bs-toggle="tooltip"
                       data-bs-dismiss="click"
                       title="Select photo">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" id="userPhoto" name="photo" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="photo_remove" />
                    <!--end::Inputs-->
                </label>
                <!--end::Edit button-->

            </div>
            <!--end::Image input-->
        </div>


        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
            <? foreach ($activeLang as $lang){?>
                <li class="nav-item">
                    <a class="nav-link<?=($lang['code'] == 'en' ? ' active' : '')?>" data-bs-toggle="tab" href="#user_general_lang_<?=$lang['code']?>">
                        <div class="symbol symbol-circle symbol-20px">
                            <img src="<?=$lang['icon']?>" alt=""/>
                        </div>
                    </a>
                </li>
            <?}?>
        </ul>


        <div class="tab-content" id="myTabContent">

            <? foreach ($activeLang as $lang){?>

                <?if($lang['code'] == 'en'){?>
                    <div class="tab-pane fade show active" id="user_general_lang_en" role="tabpanel">
                        <div class="form-floating  tt-form-floating-icon mb-5">
                            <input type="text" name="name" class="form-control tt-shadow-sm" value="<?=$company->name?>" id="depName" placeholder="Name department"/>
                            <label for="depName">Company name</label>
                            <span class="svg-icon">
                                 <i class="bi bi-person-badge"></i>
                            </span>
                        </div>

                        <div class="form-floating mb-5">
                            <textarea class="form-control" name="description" placeholder="Department Description" id="depDescription" style="height: 150px"><?=$company['description']?></textarea>
                            <label for="depDescription">Company description</label>
                        </div>
                    </div>
                <?}else{?>
                <div class="tab-pane fade" id="user_general_lang_<?=$lang['code']?>" role="tabpanel" <?=($lang['dir'] == 'RTL') ? ' dir="rtl"' : ''?>>
                    <div class="form-floating  tt-form-floating-icon mb-5">
                        <input type="text" name="langCompany[<?=$lang['id']?>][name]" class="form-control tt-shadow-sm" value="<?=$company->getTranslate($lang['id'],'name')?>" id="compName<?=$lang['id']?>" placeholder="Company name"/>
                        <label for="compName<?=$lang['id']?>">Company name</label>
                        <span class="svg-icon">
                                 <i class="bi bi-person-badge"></i>
                            </span>
                    </div>

                    <div class="form-floating mb-5">
                        <textarea class="form-control" name="langCompany[<?=$lang['id']?>][description]" placeholder="Company Description" id="depDescription" style="height: 150px"><?=$company->getTranslate($lang['id'],'description')?></textarea>
                        <label for="depDescription">Company description</label>
                    </div>
                </div>

                <?}?>

            <? } ?>

        </div>




        <div class="form-floating mb-5">
            <textarea class="form-control" name="jscode" placeholder="Inserting Widgets" id="depjscode" style="height: 150px"></textarea>
            <label for="depjscode">Inserting Widgets</label>
        </div>



        <button type="submit" class="btn btn-primary">Save</button>


    </div>

</form>

<? $this->registerCssFile("/panel_assets/custom/profile/edit.css", ['depends' => ['app\assets\AcpAsset']]);  ?>
