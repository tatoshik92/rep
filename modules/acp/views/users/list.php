<?php
    Yii::$app->params['h1'] = 'Users list';
?>
<div class="mw-700px">

    <a href="/acp/users/create/" class="btn btn-primary mb-10">Create user</a>

    <? foreach ($users as $user){?>

        <div class="d-flex mb-5 align-items-md-center  border-bottom pb-5 border-1">
            <a href="/acp/users/edit/<?=$user['id']?>/" class="d-flex flex-column flex-md-row w-100  align-items-md-center text-dark text-hover-primary">
                <div class="symbol symbol-100px symbol-circle me-5 mb-2 mb-md-0">
                    <img src="<?=(!empty($user->photo)) ? $user->photo->src : '/panel_assets/media/svg/avatars/blank.svg'?>" alt="" class=" img-fit-cover"/>
                </div>
                <div class="flex-grow-1">
                    <div class="fs-3 fw-boldest">
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