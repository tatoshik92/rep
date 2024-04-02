<?php
$this->title = $user->getTranslate(Yii::$app->t->lang['id'], 'firstName', $user->firstName) . ' ' . $user->getTranslate(Yii::$app->t->lang['id'], 'lastName', $user->lastName) . (!empty($user->company) ? ' | ' . $user->company->getTranslate(Yii::$app->t->lang['id'], 'name', $user->company->name) : '');


$wats = $user->smmFields('whatsapp');
$watsval = false;
if (count($wats) > 0) {
    $watsval = $wats[0]['value'];
}

$linked = $user->smmFields('linkedin');
$linkedval = false;
if (count($linked) > 0) {
    $linkedval = $linked[0]['value'];
}

?>

<div class="page">
    <header>
        <div class="header__banner">
            <img src="/adnok/img/banner.png" class="header__banner__src">
            <a href="/<?= (Yii::$app->t->curentLang == 'en' ? 'ar' : 'en') ?>/assets/<?= $user->alias ?>/" class="header__lang">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
                    <path d="M11.238 8.09802H4.48802C3.61202 8.09802 2.94602 8.29602 2.49002 8.69202C2.03402 9.10002 1.80602 9.70002 1.80602 10.492C1.80602 12.124 2.86202 12.94 4.97402 12.94C6.63002 12.94 7.65002 12.31 8.03402 11.05H9.07802C8.93402 11.902 8.48402 12.586 7.72802 13.102C6.98402 13.618 6.06602 13.876 4.97402 13.876C3.64202 13.876 2.60402 13.582 1.86002 12.994C1.12802 12.406 0.762024 11.578 0.762024 10.51C0.762024 9.57402 1.03202 8.81202 1.57202 8.22402C2.12402 7.64802 2.87402 7.31202 3.82202 7.21602V3.76002C3.82202 2.52402 4.12802 1.61202 4.74002 1.02402C5.36402 0.424023 6.31202 0.124023 7.58402 0.124023C8.62802 0.124023 9.42002 0.334023 9.96002 0.754023C10.512 1.16202 10.872 1.82202 11.04 2.73402L10.032 2.84202C9.86402 2.17002 9.60002 1.70802 9.24002 1.45602C8.88002 1.19202 8.31002 1.06002 7.53002 1.06002C6.57002 1.06002 5.88602 1.28202 5.47802 1.72602C5.07002 2.17002 4.86602 2.92002 4.86602 3.97602V7.12602H11.238V8.09802Z" fill="white" />
                </svg>
            </a>
            <img src="/adnok/img/logo.svg" class="header__logo">
        </div>
        <div class="header__user">

            <div class="user__photo">
                <img src="<?= $user->photo->src ?>">
            </div>
            <h1 class="user__name"><?= $user->getTranslate(Yii::$app->t->lang['id'], 'firstName', $user->firstName) ?> <?= $user->getTranslate(Yii::$app->t->lang['id'], 'lastName', $user->lastName) ?></h1>
            <div class="user__role">
                <?= $user->getTranslate(Yii::$app->t->lang['id'], 'role', $user->role) ?>
                <!-- <div class="user_role-small">
                    Recreation & Hospitality Services, ADNOC HQ
                </div> -->
            </div>
            <!-- <a href="/adnok/img/qr-code.png" class="user__photo_qr" data-fancybox>
                <img src="/adnok/img/qr.png">
            </a> -->
        </div>
        <div class="header__button">
            <a href="<?= $user->vCard ?>" class="header__button-add">Add Contact</a>
            <? if ($linkedval) { ?>
                <a href="<?= $linkedval ?>" class="header__button-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
                        <rect x="0.5" y="0.5" width="43" height="43" rx="15.5" stroke="#E7EBEF" />
                        <path d="M17.6 30.0002H14.2V19.3001H17.6V30.0002ZM15.9 17.8001C14.8 17.8001 14 17 14 15.9C14 14.8 14.9 14 15.9 14C17 14 17.8 14.8 17.8 15.9C17.8 17 17 17.8001 15.9 17.8001ZM30 30.0002H26.6V24.2001C26.6 22.5001 25.9 22.0001 24.9 22.0001C23.9 22.0001 22.9 22.8001 22.9 24.3001V30.0002H19.5V19.3001H22.7V20.8001C23 20.1001 24.2 19.0001 25.9 19.0001C27.8 19.0001 29.8 20.1001 29.8 23.4001V30.0002H30Z" fill="#0077B5" />
                    </svg>
                </a>
            <? } ?>
            <? if ($watsval) { ?>
                <a href="<?= $watsval ?>" class="header__button-link">
                    <img src="/adnok/img/icon-wa.png">
                </a>
            <? } ?>
        </div>
    </header>


    <div class="info__group">
        <div class="title">
            Contact Details
        </div>

        <div class="info__group-list">


            <?php
            $emails = $user->getProps('email');
            foreach ($emails as $filed) { ?>
                <a href="mailto:<?= $filed['value'] ?>" class="info__group-item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" fill="none">
                            <path d="M1.00012 1.01221L8.53126 7.28815C9.27601 7.90878 10.3578 7.90878 11.1026 7.28815L18.6337 1.01221" stroke="#455664" stroke-width="0.857145" stroke-linecap="round" />
                            <rect x="0.428695" y="0.429061" width="19.1429" height="14.1429" rx="1.62143" stroke="#455664" stroke-width="0.857145" />
                        </svg>
                    </div>
                    <div class="info">
                        <div class="info__title"><?= Yii::$app->t->getT('front_temail_' . $filed['type'], \app\models\user\Props::$fields['email']['type'][$filed['type']]) ?></div>
                        <div class="info__value"><?= $filed['value'] ?></div>
                    </div>
                </a>
            <? } ?>

            <?php
            $phones = $user->getProps('phone');
            foreach ($phones as $filed) { ?>

                <a href="<?= $filed['value'] ?>" class="info__group-item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                            <path d="M10.4349 22.2334V20.3865C10.4093 20.0757 10.6376 19.8017 10.948 19.7708H15.0523C15.3626 19.8017 15.5909 20.0757 15.5653 20.3865V22.2334" stroke="#455664" stroke-width="0.641026" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.9483 6.84256H15.0526" stroke="#455664" stroke-width="0.641026" stroke-linecap="round" stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.1044 3.76417H8.89589C7.76252 3.76417 6.84375 4.68294 6.84375 5.8163V20.1813C6.84375 21.3146 7.76252 22.2334 8.89589 22.2334H17.1044C18.2378 22.2334 19.1566 21.3146 19.1566 20.1813V5.8163C19.1566 4.68294 18.2378 3.76417 17.1044 3.76417Z" stroke="#455664" stroke-width="0.641026" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="info">
                        <div class="info__title"><?= Yii::$app->t->getT('front_tphone_' . $filed['type'], \app\models\user\Props::$fields['phone']['type'][$filed['type']]) ?></div>
                        <div class="info__value"><?= $filed['value'] ?></div>
                    </div>
                </a>
            <? } ?>


        </div>
    </div>

    <div class="info__group">
        <div class="title">
            Company Details
        </div>

        <div class="info__group-list">
            <a href="https://www.adnoc.ae" class="info__group-item">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <g clip-path="url(#clip0_1_1229)">
                            <circle cx="10.0025" cy="10.0014" r="8.84615" stroke="#455664" stroke-width="0.769231" />
                            <path d="M9.42557 18.6552V18.6552C4.64619 13.8758 4.64619 6.12684 9.42557 1.34746V1.34746" stroke="#455664" stroke-width="0.769231" />
                            <path d="M10.5794 18.6552V18.6552C15.3588 13.8758 15.3588 6.12684 10.5794 1.34746V1.34746" stroke="#455664" stroke-width="0.769231" />
                            <path d="M1.34863 10.0012L18.6563 10.0012" stroke="#455664" stroke-width="0.769231" />
                            <path d="M3.07941 4.23206V4.23206C6.99645 7.82267 13.0085 7.82267 16.9256 4.23206V4.23206" stroke="#455664" stroke-width="0.769231" />
                            <path d="M3.07941 15.7705V15.7705C6.99645 12.1799 13.0085 12.1799 16.9256 15.7705V15.7705" stroke="#455664" stroke-width="0.769231" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1_1229">
                                <rect width="18.4615" height="18.4615" fill="white" transform="translate(0.769409 0.769287)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="info">
                    <div class="info__title">Website</div>
                    <div class="info__value">www.adnoc.ae</div>
                </div>
            </a>


            <a href="tel:+97126023389" class="info__group-item">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M8.39422 16.423H5.26922C4.73817 16.423 4.30768 15.9926 4.30768 15.4615V7.5769C4.30768 7.04585 4.73817 6.61536 5.26922 6.61536H19.6923C20.2233 6.61536 20.6538 7.04585 20.6538 7.57689V15.4615C20.6538 15.9926 20.2233 16.423 19.6923 16.423H16.5673" stroke="#455664" stroke-width="0.769231" stroke-linecap="round" />
                        <path d="M7.57544 12.0631L17.3831 12.0631" stroke="#455664" stroke-width="0.769231" stroke-linecap="round" />
                        <path d="M8.6684 12.0631H16.2966V18.7298C16.2966 19.2608 15.8661 19.6913 15.3351 19.6913H9.62993C9.09889 19.6913 8.6684 19.2608 8.6684 18.7298V12.0631Z" stroke="#455664" stroke-width="0.769231" stroke-linecap="round" />
                        <path d="M8.6684 6.61536H16.2966V4.30766C16.2966 3.77662 15.8661 3.34613 15.3351 3.34613H9.62993C9.09889 3.34613 8.6684 3.77662 8.6684 4.30766V6.61536Z" stroke="#455664" stroke-width="0.769231" stroke-linecap="round" />
                        <path d="M15.2039 8.79541H18.4731" stroke="#455664" stroke-width="0.769231" stroke-linecap="round" />
                        <path d="M11.0385 14.8846H14.3077" stroke="#455664" stroke-width="0.769231" stroke-linecap="round" />
                    </svg>
                </div>
                <div class="info">
                    <div class="info__title">Fax</div>
                    <div class="info__value">+971 2 6023389</div>
                </div>
            </a>

            <div class="info__group-item">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25" fill="none">
                        <path d="M13.4083 20.3888L13.5854 20.7302H13.5854L13.4083 20.3888ZM12.5918 20.3888L12.4147 20.7302H12.4147L12.5918 20.3888ZM19.7949 11.3591C19.7949 13.7922 18.5545 15.7606 17.0911 17.2366C15.6281 18.7123 13.9744 19.6618 13.2312 20.0473L13.5854 20.7302C14.3631 20.3268 16.095 19.3339 17.6374 17.7782C19.1794 16.2229 20.5641 14.0709 20.5641 11.3591H19.7949ZM13 4.56418C16.7527 4.56418 19.7949 7.60635 19.7949 11.3591H20.5641C20.5641 7.18151 17.1776 3.79495 13 3.79495V4.56418ZM6.20517 11.3591C6.20517 7.60635 9.24734 4.56418 13 4.56418V3.79495C8.82251 3.79495 5.43594 7.18151 5.43594 11.3591H6.20517ZM12.7689 20.0473C12.0257 19.6618 10.372 18.7123 8.90895 17.2366C7.44557 15.7606 6.20517 13.7922 6.20517 11.3591H5.43594C5.43594 14.0709 6.82069 16.2229 8.36269 17.7782C9.90504 19.3339 11.637 20.3268 12.4147 20.7302L12.7689 20.0473ZM13.2312 20.0473C13.0829 20.1243 12.9172 20.1243 12.7689 20.0473L12.4147 20.7302C12.7851 20.9223 13.215 20.9223 13.5854 20.7302L13.2312 20.0473ZM15.6924 11.359C15.6924 12.846 14.487 14.0514 13 14.0514V14.8206C14.9118 14.8206 16.4616 13.2708 16.4616 11.359H15.6924ZM13 8.66674C14.487 8.66674 15.6924 9.87213 15.6924 11.359H16.4616C16.4616 9.44729 14.9118 7.89751 13 7.89751V8.66674ZM10.3077 11.359C10.3077 9.87213 11.5131 8.66674 13 8.66674V7.89751C11.0883 7.89751 9.53851 9.44729 9.53851 11.359H10.3077ZM13 14.0514C11.5131 14.0514 10.3077 12.846 10.3077 11.359H9.53851C9.53851 13.2708 11.0883 14.8206 13 14.8206V14.0514Z" fill="#455664" />
                    </svg>
                </div>
                <div class="info">
                    <div class="info__title">Address</div>
                    <div class="info__value">ADNOC HQ, PO Box. 898 Corniche Road West, Abu Dhabi, UAE</div>
                </div>
            </div>
        </div>

    </div>


    <div class="info__group info__group-smm">
        <div class="title">
            Follow ADNOC
        </div>

        <div class="swiper2 slider-smm">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="https://www.facebook.com/ADNOCGroupOfficial/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path d="M9.8527 16.8476H12.7027V28.5806C12.7027 28.8123 12.8904 29 13.1221 29H17.9544C18.186 29 18.3737 28.8123 18.3737 28.5806V16.9029H21.6501C21.8631 16.9029 22.0423 16.743 22.0667 16.5314L22.5643 12.2119C22.5779 12.093 22.5403 11.974 22.4608 11.8849C22.3812 11.7956 22.2673 11.7446 22.1478 11.7446H18.3739V9.03686C18.3739 8.22063 18.8134 7.80673 19.6803 7.80673C19.8038 7.80673 22.1478 7.80673 22.1478 7.80673C22.3794 7.80673 22.5671 7.61894 22.5671 7.38737V3.42246C22.5671 3.19081 22.3794 3.0031 22.1478 3.0031H18.7472C18.7232 3.00193 18.67 3 18.5915 3C18.0014 3 15.9505 3.11583 14.3305 4.60621C12.5355 6.2578 12.785 8.23531 12.8446 8.57817V11.7445H9.8527C9.62105 11.7445 9.43335 11.9322 9.43335 12.1638V16.4282C9.43335 16.6598 9.62105 16.8476 9.8527 16.8476Z" fill="#2C64F6" />
                        </svg>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.linkedin.com/company/adnocgroup/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                            <g clip-path="url(#clip0_1_1176)">
                                <path d="M5.72129 8.25256H0.565063V23.7368H5.72129V8.25256Z" fill="#0077B5" />
                                <path d="M22.6429 9.66705C21.5598 8.48471 20.1273 7.89343 18.3462 7.89343C17.6899 7.89343 17.0934 7.97416 16.5568 8.13571C16.0204 8.29716 15.5674 8.52368 15.1975 8.81538C14.8278 9.10707 14.5334 9.37787 14.3148 9.62775C14.1069 9.86511 13.9037 10.1416 13.7054 10.4544V8.25256H8.56451L8.58028 9.00265C8.59084 9.50281 8.59604 11.0444 8.59604 13.6276C8.59604 16.211 8.58564 19.5807 8.56473 23.737H13.7054V15.0962C13.7054 14.5651 13.7623 14.1433 13.8771 13.8305C14.0961 13.299 14.4264 12.854 14.8694 12.4948C15.3123 12.1351 15.8616 11.9554 16.5181 11.9554C17.4137 11.9554 18.0727 12.2653 18.4947 12.8851C18.9165 13.5048 19.1274 14.3616 19.1274 15.4554V23.7365H24.268V14.8621C24.2676 12.5806 23.7264 10.849 22.6429 9.66705Z" fill="#0077B5" />
                                <path d="M3.17415 0.799438C2.30967 0.799438 1.60921 1.05223 1.07261 1.55731C0.536055 2.0625 0.267944 2.70029 0.267944 3.4713C0.267944 4.23152 0.528339 4.86713 1.04918 5.37741C1.56986 5.88774 2.25746 6.14305 3.11159 6.14305H3.14284C4.01794 6.14305 4.72376 5.88796 5.26015 5.37741C5.79653 4.86713 6.0595 4.23174 6.04916 3.4713C6.03876 2.70035 5.77295 2.0625 5.25227 1.55731C4.73164 1.05201 4.03868 0.799438 3.17415 0.799438Z" fill="#0077B5" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1_1176">
                                    <rect width="24.0001" height="24" fill="white" transform="translate(0.268066 0.267578)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://twitter.com/AdnocGroup">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23" viewBox="0 0 24 23" fill="none">
                            <g clip-path="url(#clip0_1_1184)">
                                <path d="M18.8797 0.614136H22.5597L14.4797 9.81414L23.9197 22.2941H16.5117L10.7117 14.7101L4.07168 22.2941H0.391682L8.95168 12.4541L-0.0883179 0.614136H7.50368L12.7437 7.54214L18.8797 0.614136ZM17.5917 20.1341H19.6317L6.43168 2.69414H4.23968L17.5917 20.1341Z" fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1_1184">
                                    <rect width="24" height="21.68" fill="white" transform="translate(-6.10352e-05 0.613281)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.youtube.com/channel/UCUT3t_cLWisExZKLw6ex_3A">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="23" viewBox="0 0 32 23" fill="none">
                            <g clip-path="url(#clip0_1_1188)">
                                <path d="M30.9937 3.52197C30.6274 2.16751 29.5708 1.10688 28.2164 0.744616C26.397 0.0422257 8.77485 -0.301925 3.6629 0.764741C2.30844 1.13103 1.24781 2.18763 0.885545 3.5421C0.0644128 7.14462 0.00202285 14.9333 0.905671 18.6163C1.27196 19.9708 2.32856 21.0314 3.68303 21.3937C7.28554 22.2229 24.4126 22.3396 28.2365 21.3937C29.591 21.0274 30.6516 19.9708 31.0138 18.6163C31.8893 14.6918 31.9517 7.38613 30.9937 3.52197Z" fill="#FF0000" />
                                <path d="M21.1321 11.0691L12.9208 6.35962V15.7785L21.1321 11.0691Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1_1188">
                                    <rect width="32" height="22.1384" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/adnocgroup/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path d="M8.21506 4.64502C7.42465 4.9524 6.75623 5.36224 6.0878 6.03067C5.41937 6.69422 5.00953 7.36753 4.70215 8.15305C4.40453 8.91418 4.20449 9.78753 4.14594 11.0658C4.08739 12.3441 4.07275 12.754 4.07275 16.0132C4.07275 19.2724 4.08739 19.6822 4.14594 20.9605C4.20449 22.2388 4.40941 23.1122 4.70215 23.8733C5.00953 24.6637 5.41937 25.3322 6.0878 26.0006C6.75623 26.669 7.42465 27.0788 8.21506 27.3862C8.97619 27.6838 9.84954 27.8839 11.1278 27.9424C12.4062 28.001 12.816 28.0156 16.0752 28.0156C19.3344 28.0156 19.7442 28.001 21.0225 27.9424C22.3008 27.8839 23.1742 27.679 23.9353 27.3862C24.7257 27.0788 25.3942 26.669 26.0626 26.0006C26.731 25.3322 27.1409 24.6637 27.4482 23.8733C27.7459 23.1122 27.9459 22.2388 28.0044 20.9605C28.063 19.6822 28.0776 19.2724 28.0776 16.0132C28.0776 12.754 28.063 12.3441 28.0044 11.0658C27.9459 9.78753 27.741 8.91418 27.4482 8.15305C27.1409 7.36753 26.731 6.69422 26.0675 6.03067C25.399 5.36224 24.7306 4.9524 23.9402 4.64502C23.1791 4.3474 22.3057 4.14736 21.0274 4.08881C19.7491 4.03026 19.3393 4.01562 16.0801 4.01562C12.8209 4.01562 12.411 4.03026 11.1327 4.08881C9.84954 4.14248 8.97619 4.3474 8.21506 4.64502ZM20.925 6.24535C22.0959 6.29902 22.7302 6.49418 23.1547 6.66006C23.7158 6.87962 24.1158 7.13821 24.5354 7.55781C24.955 7.97741 25.2136 8.37749 25.4332 8.93858C25.5991 9.36305 25.7942 9.99733 25.8479 11.1683C25.9065 12.432 25.9162 12.8125 25.9162 16.0181C25.9162 19.2236 25.9016 19.6042 25.8479 20.8678C25.7942 22.0388 25.5991 22.6731 25.4332 23.0976C25.2136 23.6586 24.955 24.0587 24.5354 24.4783C24.1158 24.8979 23.7158 25.1565 23.1547 25.3761C22.7302 25.542 22.0959 25.7371 20.925 25.7908C19.6613 25.8493 19.2807 25.8591 16.0752 25.8591C12.8697 25.8591 12.4891 25.8445 11.2254 25.7908C10.0545 25.7371 9.42018 25.542 8.99571 25.3761C8.43462 25.1565 8.03453 24.8979 7.61494 24.4783C7.19534 24.0587 6.93675 23.6586 6.71719 23.0976C6.55131 22.6731 6.35614 22.0388 6.30248 20.8678C6.24393 19.6042 6.23417 19.2236 6.23417 16.0181C6.23417 12.8125 6.24881 12.432 6.30248 11.1683C6.35614 9.99733 6.55131 9.36305 6.71719 8.93858C6.93675 8.37749 7.19534 7.97741 7.61494 7.55781C8.03453 7.13821 8.43462 6.87962 8.99571 6.66006C9.42018 6.49418 10.0545 6.29902 11.2254 6.24535C12.4891 6.1868 12.8697 6.17704 16.0752 6.17704C19.2807 6.17704 19.6613 6.1868 20.925 6.24535Z" fill="url(#paint0_radial_1_1193)" />
                            <path d="M9.91296 16.0181C9.91296 19.4236 12.6745 22.1803 16.0752 22.1803C19.4759 22.1803 22.2374 19.4188 22.2374 16.0181C22.2374 12.6174 19.4808 9.85583 16.0752 9.85583C12.6696 9.85583 9.91296 12.6125 9.91296 16.0181ZM20.076 16.0181C20.076 18.2283 18.2854 20.0189 16.0752 20.0189C13.865 20.0189 12.0744 18.2283 12.0744 16.0181C12.0744 13.8079 13.865 12.0173 16.0752 12.0173C18.2854 12.0173 20.076 13.8079 20.076 16.0181Z" fill="url(#paint1_radial_1_1193)" />
                            <path d="M22.4863 11.0512C23.2812 11.0512 23.9256 10.4068 23.9256 9.61192C23.9256 8.81701 23.2812 8.17261 22.4863 8.17261C21.6913 8.17261 21.0469 8.81701 21.0469 9.61192C21.0469 10.4068 21.6913 11.0512 22.4863 11.0512Z" fill="#654C9F" />
                            <defs>
                                <radialGradient id="paint0_radial_1_1193" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(4.50952 25.8183) rotate(-3.00009) scale(34.7053 29.4992)">
                                    <stop stop-color="#FED576" />
                                    <stop offset="0.2634" stop-color="#F47133" />
                                    <stop offset="0.6091" stop-color="#BC3081" />
                                    <stop offset="1" stop-color="#4C63D2" />
                                </radialGradient>
                                <radialGradient id="paint1_radial_1_1193" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(10.1365 21.0502) rotate(-3.00009) scale(17.8216 15.1482)">
                                    <stop stop-color="#FED576" />
                                    <stop offset="0.2634" stop-color="#F47133" />
                                    <stop offset="0.6091" stop-color="#BC3081" />
                                    <stop offset="1" stop-color="#4C63D2" />
                                </radialGradient>
                            </defs>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </div>

</div>