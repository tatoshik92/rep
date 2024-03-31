<?php
    Yii::$app->params['h1'] = 'Department';
?>
<div class="mw-700px">

    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
        <div class="me-7 mb-4">
            <div class="symbol symbol-100px symbol-fixed symbol-circle">
                <img src="<?=(!empty($dep->logo->src) ? $dep->logo->src : '/panel_assets/media/svg/avatars/blank.svg')?>" class="img-fit-cover" alt="image">
            </div>
        </div>
        <div class="flex-grow-1">
            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                <div class="d-flex flex-column">
                    <div class="d-flex align-items-center mb-2">
                        <h2 class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1"><?=$dep->name?></h2>
                    </div>
                    <div class="text-muted fs-6 mb-4 pe-2">
                        <?=$dep->description?>
                    </div>
                </div>
                <div class="d-flex my-4 align-items-center">
                    <a href="/acp/departments/edit/<?=$dep->id?>/" class="btn btn-primary me-3">Edit</a>
                    <button type="button" class="btn btn-icon btn-sm btn-white btn-circle  border-dotted border-1 border-gray-400 tt_fn_delete"><span class="svg-icon svg-icon-1"><i class="bi bi-trash"></i></span></button>
                </div>
            </div>
        </div>
    </div>


    <h2 class="my-10">Members</h2>

    <? foreach ($dep->users as $user){?>
        <div class="d-flex mb-5 align-items-md-center  border-bottom pb-5 border-1">
            <a href="/acp/users/edit/<?=$user['id']?>/" class="d-flex flex-column flex-md-row w-100  align-items-md-center text-dark text-hover-primary">
                <div class="symbol symbol-65px symbol-circle me-5 mb-2 mb-md-0">
                    <img src="<?=$user->photo->src?>" alt="" class="img-fit-cover"/>
                </div>
                <div class="flex-grow-1">
                    <div class="fs-4 fw-boldest">
                        <div class="text-gray-600 fs-6 fw-bold">#<?=$user['id']?></div>
                        <?=$user['firstName']?> <?=$user['lastName']?>
                    </div>
                    <div class="text-muted diplomaItemDescription">
                        <?=$user['role']?>
                    </div>
                </div>
            </a>
            <div class="flex-column d-flex position-absolute position-md-relative end-0 me-5 me-md-0">
                <a href="/acp/users/delete/?id=<?=$user['id']?>"  type="button" class="btn btn-icon btn-sm btn-white mb-2 btn-circle  border-dotted border-1 border-gray-400"><span class="svg-icon svg-icon-1"><i class="bi bi-trash  text-danger"></i></span></a>
            </div>
        </div>
    <?}?>

</div>