
<?php

if(empty($dep->id)){
    Yii::$app->params['h1'] = 'Create department';
}else{
    Yii::$app->params['h1'] = 'Edit department';
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

    <div class="mw-500px">
        <div class="mb-5">
            <!--begin::Image input-->
            <div class="image-input bgi-position-center <?if(!$dep->logo->src){?> image-input-empty<?}?>" data-kt-image-input="true" style="background-image: url(/panel_assets/media/svg/avatars/blank.svg)">
                <!--begin::Image preview wrapper-->
                <label for="userPhoto" class="d-block">
                    <div class="image-input-wrapper overflow-hidden w-125px h-125px  bgi-position-center" style="background-image: <?if($dep->logo->src){?>url(<?=$dep->logo->src?>)<?}else{?>none;<?}?>"></div>
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



        <div class="form-floating  tt-form-floating-icon mb-5">
            <input type="text" name="name" class="form-control tt-shadow-sm" value="<?=$dep->name?>" id="depName" placeholder="Name department"/>
            <label for="depName">Department name</label>
            <span class="svg-icon">
                 <i class="bi bi-person-badge"></i>
            </span>
        </div>

        <div class="form-floating mb-5">
            <textarea class="form-control" name="description" placeholder="Department Description" id="depDescription" style="height: 150px"><?=$dep['description']?></textarea>
            <label for="depDescription">Department description</label>
        </div>



        <button type="submit" class="btn btn-primary">Save</button>


    </div>

</form>

<? $this->registerCssFile("/panel_assets/custom/profile/edit.css", ['depends' => ['app\assets\AcpAsset']]);  ?>
<? $this->registerJsFile('/panel_assets/plugins/custom/formrepeater/formrepeater.bundle.js', ['depends' => ['app\assets\AcpAsset']]); ?>
<? $this->registerJsFile('/panel_assets/custom/profile/edit.js', ['depends' => ['app\assets\AcpAsset']]); ?>
