<?
use app\assets\AcpAsset;
use yii\bootstrap4\Html;
AcpAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<!--begin::Head-->
<head>
    <base href="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php
    $system_config = \app\models\Config::getValues();
    ?>

    <style>
        :root {
            --main-primary: <?=$system_config['css_color_primary']?>;
            --main-primary-active: <?=$system_config['css_color_primary-active']?>;
            --main-primary-light: <?=$system_config['css_color_primary-light']?>;
        }
    </style>

    <?php $this->head() ?>
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed">
<?php $this->beginBody() ?>

<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '80%'}" data-kt-drawer-direction="start" data-kt-drawer-toggle=".kt_aside_toggle">
            <!--begin::Brand-->
            <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                <!--begin::Logo-->
                <a href="/acp/" class="aside_logo_a">
                    <img src="<?=$system_config['panel_logo']?>" class="w-100">
                </a>

                <a href="/acp/profile/" class="d-flex flex-stack aside_profile">
                    <!--begin::Flag-->
                    <div class="symbol symbol-35px symbol-circle me-2 bg-white">
                        <img src="<?=(!empty(Yii::$app->user->identity->photo->src)) ? Yii::$app->user->identity->photo->src : '/panel_assets/media/svg/avatars/blank.svg' ?>" class="img-fit-cover" alt="">
                    </div>
                    <!--end::Flag-->
                    <!--begin::Section-->
                    <div class="d-flex flex-stack w-100 text-white">
                        <div class="me-5">
                            <div class=" fw-boldest fs-5"><?=Yii::$app->user->identity->firstName?> <?=Yii::$app->user->identity->lastName?></div>
                            <div class="fw-light fs-8"><?=Yii::$app->user->identity->role?></div>
                        </div>
                        <!--end::Content-->
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <div class="m-0">
                                <span class="svg-icon svg-icon-3 svg-icon-white ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>

            </div>

            <div class="aside-menu flex-column-fluid">
                <div class="menu menu-column menu-pill menu-title-gray-800 menu-icon-primary menu-state-primary menu-arrow-gray-300 fw-bold fs-5 my-5 mt-lg-2 mb-lg-0" id="kt_aside_menu" data-kt-menu="true">
                    <div class="hover-scroll-y me-n3 pe-3" id="kt_aside_menu_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-offset="20px">

                        <?

                        // include ($_SERVER['DOCUMENT_ROOT'].'/modules/'.Yii::$app->controller->module->id.'/views/layouts/left_menu.php')

                        ?>

                        <div class="menu-item mb-1">
                            <a class="menu-link" href="/acp/profile/">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/layouts/lay009.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                                                  <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                  <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                                                </svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-title">My profile</span>
                            </a>
                        </div>

                        <div class="menu-item mb-1">
                            <a class="menu-link" href="/acp/stat/">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/layouts/lay009.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                                                  <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
                                                </svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-title">Statistics</span>
                            </a>
                        </div>

                        <? if(Yii::$app->user->identity->isSuperAdmin == 'Y'){?>

                        <div class="menu-item mb-1">
                            <a class="menu-link" href="/acp/departments/">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/layouts/lay009.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                                  <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                                                  <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                                                </svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-title">Departments</span>
                            </a>
                        </div>


                        <div class="menu-item mb-1">
                            <a class="menu-link" href="/acp/users/">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/layouts/lay009.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                                  <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                                </svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-title">Users</span>
                            </a>
                        </div>

                        <div class="menu-item mb-1">
                            <a class="menu-link" href="/acp/company/">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/layouts/lay009.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-disc" viewBox="0 0 16 16">
                                              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                              <path d="M10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 4a4 4 0 0 0-4 4 .5.5 0 0 1-1 0 5 5 0 0 1 5-5 .5.5 0 0 1 0 1zm4.5 3.5a.5.5 0 0 1 .5.5 5 5 0 0 1-5 5 .5.5 0 0 1 0-1 4 4 0 0 0 4-4 .5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                <span class="menu-title">Company</span>
                            </a>
                        </div>


                            <div class="menu-item mb-1">
                                <a class="menu-link" href="/acp/lang/">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/layouts/lay009.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                                              <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z"/>
                                              <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z"/>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">Languages</span>
                                </a>
                            </div>


                            <div class="menu-item mb-1">
                                <a class="menu-link" href="/acp/conf/">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/layouts/lay009.svg-->
                                        <span class="svg-icon svg-icon-2">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">Settings</span>
                                </a>
                            </div>

                            <div class="menu-item mb-1">
                                <a class="menu-link" href="/acp/gcard/">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/layouts/lay009.svg-->
                                        <span class="svg-icon svg-icon-2">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">Card generation</span>
                                </a>
                            </div>

                        <?}?>


                    </div>
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Aside menu-->

            <!--begin::Footer-->
            <div class="aside-footer flex-column-auto px-6 pb-5" id="kt_aside_footer">
                <a href="/assets/<?=Yii::$app->user->identity->uid?>/" target="_blank" class="btn btn-light-primary w-100">My eCard</a>
            </div>
            <!--end::Footer-->

        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">
                    <!--begin::Page title-->
                    <div class="page-title d-flex align-items-center w-100 justify-content-center me-2 mb-lg-0 overflow-hidden" >
                        <!--begin::Heading-->

                        <? if(!empty(Yii::$app->params['h1_back_link'])){?>
                            <a href="<?=Yii::$app->params['h1_back_link']?>" class="tt_link_back me-3">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M18.8758 8.43163L18.907 8.43846H5.52391L9.73106 4.22203C9.93708 4.01618 10.0501 3.73732 10.0501 3.44463C10.0501 3.15195 9.93708 2.87504 9.73106 2.6687L9.07643 2.01374C8.87057 1.80788 8.59626 1.69406 8.30374 1.69406C8.01106 1.69406 7.73659 1.80707 7.53074 2.01292L0.318866 9.22415C0.112199 9.43082 -0.000808652 9.70611 4.35632e-06 9.99895C-0.000808652 10.2934 0.112199 10.5689 0.318866 10.7752L7.53074 17.9871C7.73659 18.1928 8.0109 18.306 8.30374 18.306C8.59626 18.306 8.87057 18.1926 9.07643 17.9871L9.73106 17.3321C9.93708 17.1266 10.0501 16.8521 10.0501 16.5594C10.0501 16.2669 9.93708 16.0069 9.73106 15.8012L5.47643 11.5612H18.8907C19.4935 11.5612 20 11.0417 20 10.4393V9.51293C20 8.91049 19.4785 8.43163 18.8758 8.43163Z" fill="black" fill-opacity="0.5"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        <?}?>

                        <h1 class="text-dark fw-bolder mt-1 mb-1 fs-1 w-100" <? if(empty(Yii::$app->params['h1_back_link'])){?> style="text-align: left;"<?}?>>
                            <?=Yii::$app->params['h1']?>
                            <? if(!empty(Yii::$app->params['h1_small_text'])){?><small class="text-muted fs-6 fw-normal ms-1"><?=Yii::$app->params['h1_small_text']?></small></small><?}?>
                        </h1>
                        <!--end::Heading-->
                    </div>
                    <!--end::Page title=-->

                    <!--begin::Toolbar wrapper-->
                    <div class="d-flex align-items-center flex-shrink-0">
                        <!--begin::User-->
                        <div class="d-flex align-items-center ms-2 ms-lg-3" id="kt_header_user_menu_toggle">
                            <!--begin::Menu wrapper-->
                            <div class="cursor-pointer symbol symbol-circle symbol-35px symbol-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                <img alt="Pic" src="<?=(!empty(Yii::$app->user->identity->photo->src)) ? Yii::$app->user->identity->photo->src : '/panel_assets/media/svg/avatars/blank.svg' ?>" />
                            </div>
                            <!--begin::User account menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="Logo" src="<?=(!empty(Yii::$app->user->identity->photo->src)) ? Yii::$app->user->identity->photo->src : '/panel_assets/media/svg/avatars/blank.svg' ?>" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Username-->
                                        <div class="d-flex flex-column">
                                            <div class="fw-bolder d-flex align-items-center fs-5">
                                                <?=Yii::$app->user->identity->firstName?> <?=Yii::$app->user->identity->lastName?>
                                            </div>
                                        </div>
                                        <!--end::Username-->
                                    </div>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="/acp/profile/" class="menu-link px-5">Edit profile</a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="/acp/?logout" class="menu-link px-5">Logout</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::User account menu-->
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::User -->
                        <!--begin::Aside Toggle-->
                        <div class="btn btn-icon btn-circle btn-active-light-primary ms-2 d-lg-none kt_aside_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
										</svg>
									</span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Aside Toggle-->
                    </div>
                    <!--end::Toolbar wrapper-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
                <!--begin::Container-->
                <div class="container-fluid" id="kt_content_container">

                    <?php if (Yii::$app->session->hasFlash('success')): ?>

                        <div class="alert alert-success d-flex align-items-center p-5 mb-10 mw-500px">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                    <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="d-flex flex-column">
                                <h4 class="mb-1 text-success">Successfully</h4>
                                <span><?= Yii::$app->session->getFlash('success') ?></span>
                            </div>
                        </div>


                    <?php endif; ?>



                    <?=$content?>

                </div>
                <!--end::Container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->





<? if(!empty($system_config['support_wa'])){?>
<a class="button_whatsapp" target="_blank" href="<?=$system_config['support_wa']?>"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDY4MiA2ODIuNjY2NjkiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTU0NC4zODY3MTkgOTMuMDA3ODEyYy01OS44NzUtNTkuOTQ1MzEyLTEzOS41MDM5MDctOTIuOTcyNjU1OC0yMjQuMzM1OTM4LTkzLjAwNzgxMi0xNzQuODA0Njg3IDAtMzE3LjA3MDMxMiAxNDIuMjYxNzE5LTMxNy4xNDA2MjUgMzE3LjExMzI4MS0uMDIzNDM3IDU1Ljg5NDUzMSAxNC41NzgxMjUgMTEwLjQ1NzAzMSA0Mi4zMzIwMzIgMTU4LjU1MDc4MWwtNDQuOTkyMTg4IDE2NC4zMzU5MzggMTY4LjEyMTA5NC00NC4xMDE1NjJjNDYuMzI0MjE4IDI1LjI2OTUzMSA5OC40NzY1NjIgMzguNTg1OTM3IDE1MS41NTA3ODEgMzguNjAxNTYyaC4xMzI4MTNjMTc0Ljc4NTE1NiAwIDMxNy4wNjY0MDYtMTQyLjI3MzQzOCAzMTcuMTMyODEyLTMxNy4xMzI4MTIuMDM1MTU2LTg0Ljc0MjE4OC0zMi45MjE4NzUtMTY0LjQxNzk2OS05Mi44MDA3ODEtMjI0LjM1OTM3NnptLTIyNC4zMzU5MzggNDg3LjkzMzU5NGgtLjEwOTM3NWMtNDcuMjk2ODc1LS4wMTk1MzEtOTMuNjgzNTk0LTEyLjczMDQ2OC0xMzQuMTYwMTU2LTM2Ljc0MjE4N2wtOS42MjEwOTQtNS43MTQ4NDQtOTkuNzY1NjI1IDI2LjE3MTg3NSAyNi42Mjg5MDctOTcuMjY5NTMxLTYuMjY5NTMyLTkuOTcyNjU3Yy0yNi4zODY3MTgtNDEuOTY4NzUtNDAuMzIwMzEyLTkwLjQ3NjU2Mi00MC4yOTY4NzUtMTQwLjI4MTI1LjA1NDY4OC0xNDUuMzMyMDMxIDExOC4zMDQ2ODgtMjYzLjU3MDMxMiAyNjMuNjk5MjE5LTI2My41NzAzMTIgNzAuNDA2MjUuMDIzNDM4IDEzNi41ODk4NDQgMjcuNDc2NTYyIDE4Ni4zNTU0NjkgNzcuMzAwNzgxczc3LjE1NjI1IDExNi4wNTA3ODEgNzcuMTMyODEyIDE4Ni40ODQzNzVjLS4wNjI1IDE0NS4zNDM3NS0xMTguMzA0Njg3IDI2My41OTM3NS0yNjMuNTkzNzUgMjYzLjU5Mzc1em0xNDQuNTg1OTM4LTE5Ny40MTc5NjhjLTcuOTIxODc1LTMuOTY4NzUtNDYuODgyODEzLTIzLjEzMjgxMy01NC4xNDg0MzgtMjUuNzgxMjUtNy4yNTc4MTItMi42NDQ1MzItMTIuNTQ2ODc1LTMuOTYwOTM4LTE3LjgyNDIxOSAzLjk2ODc1LTUuMjg1MTU2IDcuOTI5Njg3LTIwLjQ2ODc1IDI1Ljc4MTI1LTI1LjA5Mzc1IDMxLjA2NjQwNi00LjYyNSA1LjI4OTA2Mi05LjI0MjE4NyA1Ljk1MzEyNS0xNy4xNjc5NjggMS45ODQzNzUtNy45MjU3ODItMy45NjQ4NDQtMzMuNDU3MDMyLTEyLjMzNTkzOC02My43MjY1NjMtMzkuMzMyMDMxLTIzLjU1NDY4Ny0yMS4wMTE3MTktMzkuNDU3MDMxLTQ2Ljk2MDkzOC00NC4wODIwMzEtNTQuODkwNjI2LTQuNjE3MTg4LTcuOTM3NS0uMDM5MDYyLTExLjgxMjUgMy40NzY1NjItMTYuMTcxODc0IDguNTc4MTI2LTEwLjY1MjM0NCAxNy4xNjc5NjktMjEuODIwMzEzIDE5LjgwODU5NC0yNy4xMDU0NjkgMi42NDQ1MzItNS4yODkwNjMgMS4zMjAzMTMtOS45MTc5NjktLjY2NDA2Mi0xMy44ODI4MTMtMS45NzY1NjMtMy45NjQ4NDQtMTcuODI0MjE5LTQyLjk2ODc1LTI0LjQyNTc4Mi01OC44Mzk4NDQtNi40Mzc1LTE1LjQ0NTMxMi0xMi45NjQ4NDMtMTMuMzU5Mzc0LTE3LjgzMjAzMS0xMy42MDE1NjItNC42MTcxODctLjIzMDQ2OS05LjkwMjM0My0uMjc3MzQ0LTE1LjE4NzUtLjI3NzM0NC01LjI4MTI1IDAtMTMuODY3MTg3IDEuOTgwNDY5LTIxLjEzMjgxMiA5LjkxNzk2OS03LjI2MTcxOSA3LjkzMzU5NC0yNy43MzA0NjkgMjcuMTAxNTYzLTI3LjczMDQ2OSA2Ni4xMDU0NjlzMjguMzk0NTMxIDc2LjY4MzU5NCAzMi4zNTU0NjkgODEuOTcyNjU2YzMuOTYwOTM3IDUuMjg5MDYyIDU1Ljg3ODkwNiA4NS4zMjgxMjUgMTM1LjM2NzE4NyAxMTkuNjQ4NDM4IDE4LjkwNjI1IDguMTcxODc0IDMzLjY2NDA2MyAxMy4wNDI5NjggNDUuMTc1NzgyIDE2LjY5NTMxMiAxOC45ODQzNzQgNi4wMzEyNSAzNi4yNTM5MDYgNS4xNzk2ODggNDkuOTEwMTU2IDMuMTQwNjI1IDE1LjIyNjU2Mi0yLjI3NzM0NCA0Ni44Nzg5MDYtMTkuMTcxODc1IDUzLjQ4ODI4MS0zNy42Nzk2ODcgNi42MDE1NjMtMTguNTExNzE5IDYuNjAxNTYzLTM0LjM3NSA0LjYxNzE4Ny0zNy42ODM1OTQtMS45NzY1NjItMy4zMDQ2ODgtNy4yNjE3MTgtNS4yODUxNTYtMTUuMTgzNTkzLTkuMjUzOTA2em0wIDAiIGZpbGwtcnVsZT0iZXZlbm9kZCIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9IiI+PC9wYXRoPjwvZz48L3N2Zz4="></a>
<?}?>

<script>var hostUrl = "/panel_assets/";</script>

<?php $this->endBody() ?>

<style>
    .symbol > img{
        object-fit: cover;
    }
</style>
</body>

</html>
<?php $this->endPage() ?>