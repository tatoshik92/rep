
<?php


if(empty($user->id)){
    Yii::$app->params['h1'] = 'Create user';
}else{
    Yii::$app->params['h1'] = 'Edit user';
}

$activeLang = Yii::$app->t->getActiveLang();

?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

<div class="mw-500px">
    <div class="mb-5">
        <!--begin::Image input-->
        <div class="image-input bgi-position-center image-input-circle <?if(!$user->photo->src){?> image-input-empty<?}?>" data-kt-image-input="true" style="background-image: url(/panel_assets/media/svg/avatars/blank.svg)">
            <!--begin::Image preview wrapper-->
            <label for="userPhoto" class="d-block">
                <div class="image-input-wrapper overflow-hidden w-125px h-125px  bgi-position-center" style="background-image: <?if($user->photo->src){?>url(<?=$user->photo->src?>)<?}else{?>none;<?}?>"></div>
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

    <? if(Yii::$app->user->identity->isSuperAdmin == 'Y'){?>
        <div class="row">
            <div class="col-12 col-md-6">
                <select class="form-select  mb-5" name="active" data-control="select2" data-placeholder="Status">
                    <option></option>
                    <? foreach (\app\models\User::$active as $code=>$status){?>
                        <option value="<?=$code?>" <?=($code == $user->active) ? ' selected' : ''?>><?=$status?></option>
                    <?}?>
                </select>
            </div>
        </div>
    <?}?>


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
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-floating  tt-form-floating-icon mb-5">
                                <input type="text" name="firstName" class="form-control tt-shadow-sm" value="<?=$user->firstName?>" id="firstName" placeholder="First Name"/>
                                <label for="firstName">First Name</label>
                                <span class="svg-icon">
                                    <i class="bi bi-person-badge"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating  tt-form-floating-icon mb-5">
                                <input type="text" name="lastName" class="form-control tt-shadow-sm" value="<?=$user->lastName?>" id="lastName" placeholder="Last Name"/>
                                <label for="lastName">Last Name</label>
                                <span class="svg-icon">
                                     <i class="bi bi-person-badge"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <? if(Yii::$app->user->identity->isSuperAdmin == 'Y'){?>
                        <div class="form-floating  tt-form-floating-icon mb-5">
                            <input type="text" name="alias" class="form-control tt-shadow-sm" value="<?=$user->alias?>" id="userAlias" placeholder="Page alias"/>
                            <label for="userAlias">Page alias</label>
                            <span class="svg-icon">
                                <i class="bi bi-link-45deg"></i>
                            </span>
                        </div>
                    <?}?>
                    <? if(Yii::$app->user->identity->isSuperAdmin == 'Y'){?>
                        <div class="form-label">Company</div>
                        <select class="form-select  mb-5" name="company_id" data-control="select2" data-placeholder="Select company">
                            <option></option>
                            <?php
                            $comps = \app\models\Company::find()->all();
                            foreach ($comps as $comp){
                                ?>
                                <option value="<?=$comp->id?>"<?=($comp->id == $user->company_id) ? ' selected' : ''?>><?=$comp->name?></option>
                                <?
                            }
                            ?>
                        </select>


                        <div class="form-label">Department</div>
                        <select class="form-select  mb-5" name="dep_id" data-control="select2" data-placeholder="Select department">
                            <option></option>
                            <?php
                            $deps = \app\models\Department::find()->all();
                            foreach ($deps as $dep){
                                ?>
                                <option value="<?=$dep->id?>"<?=($dep->id == $user->dep_id) ? ' selected' : ''?>><?=$dep->name?></option>
                                <?
                            }
                            ?>
                        </select>


                    <?}?>
                    <div class="form-floating  tt-form-floating-icon mb-5">
                        <input type="text" name="role" class="form-control tt-shadow-sm" value="<?=$user->role?>" id="userRole" placeholder="User role"/>
                        <label for="userRole">Role</label>
                        <span class="svg-icon">
                             <i class="bi bi-dpad"></i>
                        </span>
                    </div>
                    <div class="form-floating  tt-form-floating-icon mb-5">
                        <input type="text" name="calendar_link" class="form-control tt-shadow-sm" value="<?=$user->calendar_link?>" id="userCalendar" placeholder="Link to calendar"/>
                        <label for="userCalendar">Link to calendar</label>
                        <span class="svg-icon">
                             <i class="bi bi-calendar-week"></i>
                        </span>
                    </div>
                    <div class="d-flex flex-stack fs-5 mb-2">
                        <div class="fw-bolder rotate collapsible collapsed" data-bs-toggle="collapse" href="#tt_change_password" role="button" aria-expanded="false" aria-controls="tt_change_password">
                            Set password
                            <span class="ms-2 rotate-180">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div id="tt_change_password" class="collapse">
                        <div class="form-floating tt-form-floating-icon mb-5">
                            <input type="text" name="new_password" class="form-control tt-shadow-sm" value="" id="userNewPassword" placeholder="New password"/>
                            <label for="userNewPassword">New password</label>
                            <span class="svg-icon">
                                <i class="bi bi-key"></i>
                            </span>
                        </div>
                    </div>
                    <!--begin::Menu-->
                    <div class="menu menu-column my-10">

                        <div class="menu-item">
                            <a  href="#" class="menu-link" role="button" data-bs-toggle="modal" data-bs-target="#tt_phone_modal">
                                    <span class="menu-icon">
                                        <i class="bi bi-phone fs-2"></i>
                                    </span>
                                <span class="menu-title fs-2 text-dark fw-bold">Phones</span>
                                <span class="menu-badge">
                                        <span class="badge badge-sm badge-circle badge-danger"><?=count($user->getProps('phone'))?></span>
                                    </span>
                            </a>
                        </div>

                        <div class="menu-item my-4">
                            <div class="separator"></div>
                        </div>

                        <div class="menu-item">
                            <a href="#" class="menu-link"  role="button" data-bs-toggle="modal" data-bs-target="#tt_websites_modal">
                                <span class="menu-icon">
                                    <i class="bi bi-diagram-2 fs-2"></i>
                                </span>
                                <span class="menu-title fs-2 text-dark fw-bold">Websites</span>
                                <span class="menu-badge">
                                        <span class="badge badge-sm badge-circle badge-danger"><?=count($user->getProps('website'))?></span>
                                </span>
                            </a>
                        </div>

                        <div class="menu-item my-4">
                            <div class="separator"></div>
                        </div>

                        <div class="menu-item">
                            <a href="#" class="menu-link"  role="button" data-bs-toggle="modal" data-bs-target="#tt_emails_modal">
                                <span class="menu-icon">
                                    <i class="bi bi-envelope fs-2"></i>
                                </span>
                                <span class="menu-title fs-2 text-dark fw-bold">Email`s</span>
                                <span class="menu-badge">
                                      <span class="badge badge-sm badge-circle badge-danger"><?=count($user->getProps('email'))?></span>
                                </span>
                            </a>
                        </div>

                        <div class="menu-item my-4">
                            <div class="separator"></div>
                        </div>

                        <div class="menu-item">
                            <a href="#" class="menu-link"  role="button" data-bs-toggle="modal" data-bs-target="#tt_addresses_modal">
                                    <span class="menu-icon">
                                        <i class="bi bi-geo-alt fs-2"></i>
                                    </span>
                                <span class="menu-title fs-2 text-dark fw-bold">Addresses</span>
                                <span class="menu-badge">
                                        <span class="badge badge-sm badge-circle badge-danger"><?=count($user->getProps('address'))?></span>
                                    </span>
                            </a>
                        </div>

                        <div class="menu-item my-4">
                            <div class="separator"></div>
                        </div>

                        <div class="menu-item">
                            <a href="#" class="menu-link"  role="button" data-bs-toggle="modal" data-bs-target="#tt_smm_modal">
                                    <span class="menu-icon">
                                        <i class="bi bi-stack-overflow fs-2"></i>
                                    </span>
                                <span class="menu-title fs-2 text-dark fw-bold">Social media</span>
                                <span class="menu-badge">
                                        <span class="badge badge-sm badge-circle badge-danger"><?=count($user->getProps('socialmedia'))?></span>
                                    </span>
                            </a>
                        </div>

                        <div class="menu-item my-4">
                            <div class="separator"></div>
                        </div>

                    </div>
                    <!--end::Menu-->
                    <? if(Yii::$app->user->identity->isSuperAdmin == 'Y'){?>
                    <!--begin::Input group-->
                    <div class="d-flex flex-stack mb-10">
                        <!--begin::Label-->
                        <div class="me-5">
                            <label class="fs-6 fw-bold form-label">Prevent an employee from changing information?</label>
                            <div class="fs-7 fw-bold text-muted">If this checkbox is checked, then the user cannot change information about himself</div>
                        </div>
                        <!--end::Label-->

                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" name="accessEdit" type="checkbox" value="N" <?if($user->accessEdit === 'N'){?>checked="checked"<?}?>/>
                            <span class="form-check-label fw-bold text-muted"></span>
                        </label>
                        <!--end::Switch-->
                    </div>
                    <!--end::Input group-->
                    <?}?>
                </div>

            <?}else{?>
                <div class="tab-pane fade" id="user_general_lang_<?=$lang['code']?>" role="tabpanel" <?=($lang['dir'] == 'RTL') ? ' dir="rtl"' : ''?>>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-floating  tt-form-floating-icon mb-5">
                                <input type="text" name="lang[<?=$lang['id']?>][firstName]" class="form-control tt-shadow-sm" value="<?=$user->getTranslate($lang['id'],'firstName')?>" id="firstName" placeholder="First Name"/>
                                <label for="firstName">First Name</label>
                                <span class="svg-icon">
                                    <i class="bi bi-person-badge"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating  tt-form-floating-icon mb-5">
                                <input type="text" name="lang[<?=$lang['id']?>][flastName]" class="form-control tt-shadow-sm" value="<?=$user->getTranslate($lang['id'],'lastName')?>" id="lastName" placeholder="Last Name"/>
                                <label for="lastName">Last Name</label>
                                <span class="svg-icon">
                                     <i class="bi bi-person-badge"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating  tt-form-floating-icon mb-5">
                        <input type="text" name="lang[<?=$lang['id']?>][role]" class="form-control tt-shadow-sm" value="<?=$user->getTranslate($lang['id'],'role')?>" id="userRole" placeholder="User role"/>
                        <label for="userRole">Role</label>
                        <span class="svg-icon">
                             <i class="bi bi-dpad"></i>
                        </span>
                    </div>
                </div>




            <?}?>
        <?}?>



    </div>


<div class="d-flex flex-stack">
    <button type="submit" class="btn btn-primary">Save user</button>

    <a href="/assets/<?=$user->uid?>/" target="_blank" class="mb-10 mt-5 d-block">Open profile</a>
</div>




</div>



    <div class="modal fade" tabindex="-1" id="tt_phone_modal">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable  modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Phones</h2>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <i class="bi bi-x-circle"></i>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <?php
                $userPhone = $user->getProps('phone');
                $userPhoneCount =  count($userPhone);
                $userPhoneCountFor = ($userPhoneCount == 0) ? 1 : $userPhoneCount;
                ?>

                <div class="modal-body"  id="profile_repeater_phone" data-count="<?=$userPhoneCount?>">
                    <div data-repeater-list="user_phone">
                        <? for ($i = 0; $i < $userPhoneCountFor; $i++){?>
                            <div data-repeater-item class="row mb-5">
                                <div class="col-md-6">
                                    <input type="text" name="phone" value="<?=$userPhone[$i]['value']?>" class="form-control mb-2 mb-md-0" placeholder="Enter number" />
                                </div>
                                <div class="col-7 col-md-4">
                                    <select  name="type" class="form-select fs-6" data-control="select2" data-hide-search="true">
                                        <? foreach (\app\models\user\Props::$fields['phone']['type'] as $name=>$value){?>
                                            <option value="<?=$name?>"<?if($userPhone[$i]['type'] == $name){ echo ' selected';}?>><?=$value?></option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="col-5 col-md-2">
                                    <a href="javascript:;" data-repeater-delete class="btn btn-icon btn-circle btn-light-danger">
                                        <i class="la la-trash-o"></i>
                                    </a>
                                </div>
                            </div>
                        <?}?>
                    </div>
                    <div class="form-group mt-5">
                        <a href="javascript:;" data-repeater-create class="btn btn-sm btn-light-primary">
                            <i class="la la-plus"></i> Add
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Applay</button>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" tabindex="-1" id="tt_websites_modal">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable  modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Websites</h2>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <i class="bi bi-x-circle"></i>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <?php
                $userFiels = $user->getProps('website');
                $userFielsCount =  count($userFiels);
                $userFielsCountFor = ($userFielsCount == 0) ? 1 : $userFielsCount;
                ?>

                <div class="modal-body" id="profile_repeater_website" data-count="<?=($userFielsCount)?>">
                    <div data-repeater-list="user_website">
                        <? for ($i = 0; $i < $userFielsCountFor; $i++){?>
                            <div data-repeater-item class="form-group row mb-4">
                                <div class="col-7 col-md-10">
                                    <input type="text" name="website" value="<?=$userFiels[$i]['value']?>" class="form-control mb-2 mb-md-0" placeholder="Enter url" />
                                </div>
                                <div class="col-5 col-md-2">
                                    <a href="javascript:;" data-repeater-delete class="btn btn-icon btn-circle btn-light-danger">
                                        <i class="la la-trash-o"></i>
                                    </a>
                                </div>
                            </div>
                        <?}?>
                    </div>
                    <div class="form-group mt-5">
                        <a href="javascript:;" data-repeater-create class="btn btn-sm btn-light-primary">
                            <i class="la la-plus"></i> Add
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Applay</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="tt_emails_modal">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable  modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Emails</h2>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <i class="bi bi-x-circle"></i>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <?php
                $userFiels = $user->getProps('email');
                $userFielsCount =  count($userFiels);
                $userFielsCountFor = ($userFielsCount == 0) ? 1 : $userFielsCount;
                ?>

                <div class="modal-body"  id="profile_repeater_emails" data-count="<?=$userFielsCount?>">
                    <div data-repeater-list="user_email">
                        <? for ($i = 0; $i < $userFielsCountFor; $i++){?>
                            <div data-repeater-item class="row mb-5">
                                <div class="col-md-6">
                                    <input type="text" name="email" value="<?=$userFiels[$i]['value']?>" class="form-control mb-2 mb-md-0" placeholder="Enter email" />
                                </div>
                                <div class="col-7 col-md-4">
                                    <select  name="type" class="form-select fs-6" data-control="select2" data-hide-search="true">
                                        <? foreach (\app\models\user\Props::$fields['email']['type'] as $name=>$value){?>
                                            <option value="<?=$name?>"<?if($userFiels[$i]['type'] == $name){ echo ' selected';}?>><?=$value?></option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="col-5 col-md-2">
                                    <a href="javascript:;" data-repeater-delete class="btn btn-icon btn-circle btn-light-danger">
                                        <i class="la la-trash-o"></i>
                                    </a>
                                </div>
                            </div>
                        <?}?>
                    </div>
                    <div class="form-group mt-5">
                        <a href="javascript:;" data-repeater-create class="btn btn-sm btn-light-primary">
                            <i class="la la-plus"></i> Add
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Applay</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="tt_addresses_modal">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable  modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Addresses</h2>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <i class="bi bi-x-circle"></i>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <?php
                $userAddress = $user->getProps('address');
                $userAddressCount =  count($userAddress);
                $userAddressCountFor = ($userAddressCount == 0) ? 1 : $userAddressCount;
                ?>

                <div class="modal-body" id="profile_repeater_address"   data-count="<?=$userAddressCount?>">
                    <div data-repeater-list="user_address">
                        <? for ($i = 0; $i < $userAddressCountFor; $i++){
                            $curentAddress = unserialize($userAddress[$i]['value']);



                            ?>
                            <div data-repeater-item class="row mb-5">

                                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                    <? foreach ($activeLang as $lang){?>
                                        <li class="nav-item">
                                            <a class="nav-link<?=($lang['code'] == 'en' ? ' active' : '')?>" data-bs-toggle="tab" href="#user_address_lang_<?=$userAddress[$i]['id'].$lang['code']?>">
                                                <div class="symbol symbol-circle symbol-20px">
                                                    <img src="<?=$lang['icon']?>" alt=""/>
                                                </div>
                                            </a>
                                        </li>
                                    <?}?>
                                </ul>

                                <div class="tab-content w-100" id="myTabContentAddress">

                                    <? foreach ($activeLang as $lang){?>

                                        <?if($lang['code'] == 'en'){?>
                                            <div class="tab-pane fade show active w-100" id="user_address_lang_<?=$userAddress[$i]['id']?>en" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-7 col-md-10">
                                                        <select  name="type" class="form-select fs-6 mb-2" data-control="select2" data-hide-search="true">
                                                            <? foreach (\app\models\user\Props::$fields['address']['type'] as $name=>$value){?>
                                                                <option value="<?=$name?>"<?if($userAddress[$i]['type'] == $name){ echo ' selected';}?>><?=$value?></option>
                                                            <?}?>
                                                        </select>
                                                    </div>
                                                    <div class="col-5 col-md-2">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-icon btn-circle btn-light-danger">
                                                            <i class="la la-trash-o"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" name="street" value="<?=$curentAddress['street']?>" class="form-control mb-2" placeholder="House and street" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="address" value="<?=$curentAddress['address']?>" class="form-control mb-2" placeholder="Locality" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="index" value="<?=$curentAddress['index']?>" class="form-control mb-2" placeholder="Zip code" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="country" value="<?=$curentAddress['country']?>" class="form-control mb-2" placeholder="Country" />
                                                    </div>

                                                </div>
                                            </div>
                                        <?}else{?>

                                            <div class="tab-pane fade row" id="user_address_lang_<?=$userAddress[$i]['id'].$lang['code']?>" role="tabpanel">

                                                <?php

                                                $translate = [];

                                                if(!empty($userAddress[$i]['translate'][$lang['id']]['value'])){
                                                    $translate = unserialize($userAddress[$i]['translate'][$lang['id']]['value']);
                                                }

                                                ?>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" name="lang[<?=$lang['id']?>][street]" value="<?=$translate['street']?>" class="form-control mb-2" placeholder="House and street" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="lang[<?=$lang['id']?>][address]" value="<?=$translate['address']?>" class="form-control mb-2" placeholder="Locality" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="lang[<?=$lang['id']?>][index]" value="<?=$translate['index']?>" class="form-control mb-2" placeholder="Zip code" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="lang[<?=$lang['id']?>][country]" value="<?=$translate['country']?>" class="form-control mb-2" placeholder="Country" />
                                                    </div>
                                                </div>
                                            </div>


                                        <?}?>

                                    <?}?>

                                </div>




                            </div>
                        <?}?>
                    </div>
                    <div class="form-group mt-5">
                        <a href="javascript:;" data-repeater-create class="btn btn-sm btn-light-primary">
                            <i class="la la-plus"></i> Add
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Applay</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="tt_smm_modal">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable  modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Social media links</h2>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <i class="bi bi-x-circle"></i>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>


                <?
                $userSocialmedia = $user->getProps('socialmedia');
                $userSocialmediaCount =  count($userSocialmedia);
                $userSocialmediaCountFor = ($userSocialmediaCount == 0) ? 1 : $userSocialmediaCount;
                ?>
                <div  class="modal-body" id="profile_repeater_socialmedia"  data-count="<?=$userSocialmediaCount?>">
                    <div data-repeater-list="user_socialmedia">
                        <? for ($i = 0; $i < $userSocialmediaCountFor; $i++){?>
                            <div data-repeater-item class="form-group row mb-4">
                                <div class="col-md-7">
                                    <input type="text" name="socialmedia" value="<?=$userSocialmedia[$i]['value']?>" class="form-control mb-2 mb-md-0" placeholder="Enter url" />
                                </div>
                                <div class="col-7 col-md-3">
                                    <select  name="type" class="form-select fs-6" data-control="select2" data-hide-search="true">
                                        <? foreach (\app\models\user\Props::$fields['socialmedia']['type'] as $name=>$value){?>
                                            <option value="<?=$name?>"<?if($userSocialmedia[$i]['type'] == $name){ echo ' selected';}?>><?=$value?></option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="col-5 col-md-2">
                                    <a href="javascript:;" data-repeater-delete class="btn btn-icon btn-circle btn-light-danger">
                                        <i class="la la-trash-o"></i>
                                    </a>
                                </div>
                            </div>
                        <?}?>
                    </div>
                    <div class="form-group mt-5">
                        <a href="javascript:;" data-repeater-create class="btn btn-sm btn-light-primary">
                            <i class="la la-plus"></i> Add
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Applay</button>
                </div>
            </div>
        </div>
    </div>



</form>

<? $this->registerCssFile("/panel_assets/custom/profile/edit.css", ['depends' => ['app\assets\AcpAsset']]);  ?>
<? $this->registerJsFile('/panel_assets/plugins/custom/formrepeater/formrepeater.bundle.js', ['depends' => ['app\assets\AcpAsset']]); ?>
<? $this->registerJsFile('/panel_assets/custom/profile/edit.js', ['depends' => ['app\assets\AcpAsset']]); ?>
