<?php
    Yii::$app->params['h1'] = 'Companies list';
?>
<div class="mw-700px">

    <a href="/acp/company/create/" class="btn btn-primary mb-10">Create new</a>

    <? foreach ($companies as $company){?>
        <div class="d-flex mb-5 align-items-md-center  border-bottom pb-5 border-1">
            <a href="/acp/company/edit/<?=$company['id']?>/" class="d-flex flex-column flex-md-row w-100  align-items-md-center text-dark text-hover-primary">
                <div class="symbol symbol-100px symbol-circle me-5 mb-2 mb-md-0">
                    <img src="<?=(!empty($company->logo)) ? $company->logo->src : '/panel_assets/media/svg/avatars/blank.svg'?>" alt="" class=" img-fit-cover"/>
                </div>
                <div class="flex-grow-1">
                    <div class="fs-2 fw-boldest"><?=$company['name']?></div>
                    <div class="text-muted">
                        <?=$company['description']?>
                    </div>
                </div>
            </a>
            <div class="flex-column d-flex position-absolute position-md-relative end-0 me-5 me-md-0">
                <a href="/acp/company/edit/<?=$company['id']?>/"  type="button" class="btn btn-icon btn-sm btn-white mb-2 btn-circle  border-dotted border-1 border-gray-400"><span class="svg-icon svg-icon-1"><i class="bi bi-pencil-square  text-dark"></i></span></a>
                <a href="/acp/company/delete/?id=<?=$company['id']?>"  type="button" class="btn btn-icon btn-sm btn-white mb-2 btn-circle  border-dotted border-1 border-gray-400"><span class="svg-icon svg-icon-1"><i class="bi bi-trash  text-danger"></i></span></a>
            </div>
        </div>
    <?}?>

</div>