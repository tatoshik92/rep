<?php
Yii::$app->params['h1'] = 'Settings';

?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

    <div class="mw-800px">
        <h2>Panel settings</h2>
        <div class="mb-5 mt-10">
            <!--begin::Image input-->
            <div class="image-input bgi-position-center <?if(empty($conf['panel_logo'])){?> image-input-empty<?}?>" data-kt-image-input="true" style="background:#A1A5B7;">
                <!--begin::Image preview wrapper-->
                <label for="panelPhoto" class="d-block">
                    <div class="image-input-wrapper overflow-hidden w-125px h-125px  bgi-position-center" style="background-image: <?if(!empty($conf['panel_logo'])){?>url(<?=$conf['panel_logo']?>); background-size: contain;<?}else{?>none;<?}?>"></div>
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
                    <input type="file" id="panelPhoto" name="photo" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="photo_remove" />
                    <!--end::Inputs-->
                </label>
                <!--end::Edit button-->

            </div>
            <!--end::Image input-->
        </div>

        <div class="row">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-floating  tt-form-floating-icon mb-5">
                        <input type="text" name="conf[css_color_primary]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_primary']?>" id="colorPC" placeholder="Primary color">
                        <label for="colorPC">Primary color</label>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating  tt-form-floating-icon mb-5">
                        <input type="text" name="conf[css_color_primary-active]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_primary-active']?>" id="colorPAC" placeholder="Primary active color">
                        <label for="colorPAC">Primary active color</label>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating  tt-form-floating-icon mb-5">
                        <input type="text" name="conf[css_color_primary-light]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_primary-light']?>" id="colorPLC" placeholder="Primary light color">
                        <label for="colorPLC">Primary light color</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="separator"></div>

        <h2 class="mt-10 mb-5">Profile settings</h2>

        <div class="row">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-5">
                        <input type="text" name="conf[css_color_front_bg]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_front_bg']?>" id="colorPC" placeholder="Primary color">
                        <label for="colorPC">Background color</label>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-5">
                        <input type="text" name="conf[css_color_front_wrap_bg]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_front_wrap_bg']?>" id="colorPAC" placeholder="Primary active color">
                        <label for="colorPAC">Card background color</label>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-5">
                        <input type="text" name="conf[css_color_front_primary]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_front_primary']?>" id="colorPAC" placeholder="Primary active color">
                        <label for="colorPAC">Main color</label>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-5">
                        <input type="text" name="conf[css_color_front_primary_white]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_front_primary_white']?>" id="colorPAC" placeholder="Primary active color">
                        <label for="colorPAC">Basic white color</label>
                    </div>
                </div>


                <div class="col-12 col-md-4">
                    <div class="form-floating mb-5">
                        <input type="text" name="conf[css_color_front_text]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_front_text']?>" id="colorPLC" placeholder="Primary light color">
                        <label for="colorPLC">Text color</label>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-5">
                        <input type="text" name="conf[css_color_front_link]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_front_link']?>" id="colorPLC" placeholder="Primary light color">
                        <label for="colorPLC">Link color</label>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-5">
                        <input type="text" name="conf[css_color_front_placeholder]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_front_placeholder']?>" id="colorPLC" placeholder="Primary light color">
                        <label for="colorPLC">Signature color</label>
                    </div>
                </div>

                <h3 class="mt-10 mb-5">Header settings</h3>

                <div class="col-12 col-md-4">
                    <div class="form-floating mb-5">
                        <input type="text" name="conf[css_color_front_header_grad]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_front_header_grad']?>" id="colorPLC" placeholder="Primary light color">
                        <label for="colorPLC">Gradient color</label>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-floating  mb-5">
                        <input type="text" name="conf[css_color_front_header_color]" class="form-control tt-shadow-sm" value="<?=$conf['css_color_front_header_color']?>" id="colorPLC" placeholder="Primary light color">
                        <label for="colorPLC">Text color</label>
                    </div>
                </div>

            </div>
        </div>

        <div class="separator"></div>

        <h2 class="mt-10 mb-5">Support</h2>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-floating  mb-5">
                    <input type="text" name="conf[support_wa]" class="form-control tt-shadow-sm" value="<?=$conf['support_wa']?>" id="support_wa" placeholder="Primary light color">
                    <label for="support_wa">Whatsapp</label>
                </div>
            </div>
        </div>

        <div class="separator"></div>


        <button type="submit" class="btn btn-primary mt-10">Save</button>

    </div>
</form>