<?php
Yii::$app->params['h1'] = 'Languages';


$langList = \app\models\translate\Lang::getList();
?>

<form action="" method="POST">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <input type="hidden" name="action" value="lang_conf">
    <h3>Active languages</h3>
    <div class="d-flex">
        <? foreach ($langList as $lang){?>
        <div class="form-check form-check-custom form-check-solid me-10">
            <input class="form-check-input" type="checkbox" name="lang[<?=$lang['id']?>]" value="Y" <?=($lang['active'] == 'Y' ? 'checked' : '')?> id="flexCheckbox<?=$lang['id']?>"/>
            <label class="form-check-label" for="flexCheckbox<?=$lang['id']?>">
                <?=$lang['name']?>
            </label>
        </div>
        <?}?>
        <button type="submit" class="btn btn-sm btn-success">Apply</button>

    </div>
</form>

<h2 class="mt-20">Translations</h2>
<? $langActive = \app\models\translate\Lang::getActive(); ?>
<form action="" method="POST">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <input type="hidden" name="action" value="lang_translate">
    <table id="translations_table" class="table table-row-bordered gy-5">
        <thead>
            <tr class="fw-bold fs-6 text-muted">
                <th>Code</th>
                <th>Default value</th>
                <? foreach ($langActive as $k=>$lang){
                    $langActive[$k]->loadTValue();
                    ?>
                    <th><?=$lang['name']?></th>
                <?}?>
            </tr>
            </thead>
            <tbody>
            <?
                $langCode = \app\models\translate\LangValue::find()->all();
            ?>
            <? foreach ($langCode as $codeItem){?>
                <tr>

                    <td><?=$codeItem['code']?></td>
                    <td><input name="" value="<?=$codeItem['default_value']?>"></td>
                    <? foreach ($langActive as $lang){?>
                        <td>
                            <input dir="<?=$lang['dir']?>" name="langvalue[<?=$lang['id']?>][<?=$codeItem['id']?>]" value="<?=$lang->translate[$codeItem['code']]?>">
                        </td>
                    <?}?>

                </tr>
            <?}?>

        </tbody>
    </table>
    <button type="submit" class="btn btn-sm btn-success">Save</button>
</form>