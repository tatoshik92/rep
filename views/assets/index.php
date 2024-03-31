<?php
    $this->title = $user->getTranslate(Yii::$app->t->lang['id'],'firstName',$user->firstName).' '.$user->getTranslate(Yii::$app->t->lang['id'],'lastName',$user->lastName).(!empty($user->company) ? ' | '.$user->company->getTranslate(Yii::$app->t->lang['id'],'name',$user->company->name) : '');
?>
 

 <div class="wrap">

    
        <div class="page">
            <div class="logo">
                <img src="/tpl/img/logo_light.svg" class="logo_light">
                <img src="/tpl/img/logo_dark.svg" class="logo_dark">
            </div>
            <div class="user">
                <div class="photo">
                    <img src="<?=$user->photo->src?>">
                </div>
                <div class="name"><?=$user->getTranslate(Yii::$app->t->lang['id'],'firstName',$user->firstName)?> <?=$user->getTranslate(Yii::$app->t->lang['id'],'lastName',$user->lastName)?></div>
                <div class="role"><?=$user->getTranslate(Yii::$app->t->lang['id'],'role',$user->role)?></div>
            </div>

            <div class="options">
                
                <?php
                $phones = $user->getProps('phone');
                foreach ($phones as $filed){ ?>
                    <div class="item">
                        <div class="name"><?=Yii::$app->t->getT('front_tphone_'.$filed['type'],\app\models\user\Props::$fields['phone']['type'][$filed['type']])?></div>
                        <a href="tel:<?=$filed['value']?>" class="value"><?=$filed['value']?> </a>
                        <div class="icon">
                            <? if($filed['type'] == 'cell'){?>
                                <svg width="49" height="35" viewBox="0 0 49 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30.9238 0H19.0569C14.2669 0.00493374 9.67456 1.8501 6.28752 5.13063C2.90049 8.41115 0.99545 12.8591 0.990356 17.4984C0.995449 22.1381 2.90042 26.5863 6.28737 29.8674C9.67431 33.1484 14.2666 34.9942 19.0569 35H30.9238C35.7141 34.9942 40.3064 33.1484 43.6933 29.8674C47.0803 26.5863 48.9853 22.1381 48.9904 17.4984C48.9853 12.8591 47.0802 8.41115 43.6932 5.13063C40.3062 1.8501 35.7138 0.00493374 30.9238 0ZM30.9238 34.5092H19.0569C14.401 34.5034 9.93759 32.7093 6.64568 29.5203C3.35377 26.3313 1.50214 22.0079 1.49705 17.4984C1.50299 12.9895 3.35496 8.66689 6.64677 5.47858C9.93859 2.29028 14.4015 0.496554 19.0569 0.4908H30.9238C35.5791 0.496554 40.0421 2.29028 43.3339 5.47858C46.6258 8.66689 48.4776 12.9895 48.4836 17.4984C48.4819 22.0101 46.6319 26.3367 43.3396 29.5283C40.0473 32.72 35.5819 34.5158 30.9238 34.5216V34.5092Z" fill="#2F2C28"/>
                                    <path d="M30.7602 4.52929H19.4001C18.393 4.52929 17.8638 5.04186 17.8638 6.01417V27.8896C17.8638 28.865 18.393 29.3713 19.3969 29.3713H30.7539C31.7609 29.3713 32.2933 28.865 32.2933 27.8896V6.01727C32.2933 5.04497 31.7609 4.52929 30.7602 4.52929ZM25.0769 28.4829C24.9638 28.4833 24.8517 28.4621 24.747 28.4204C24.6424 28.3787 24.5473 28.3175 24.4671 28.2401C24.3869 28.1628 24.3234 28.0709 24.28 27.9697C24.2366 27.8685 24.2142 27.7599 24.2142 27.6504C24.2138 27.5404 24.2358 27.4314 24.2789 27.3296C24.3221 27.2279 24.3856 27.1354 24.4658 27.0575C24.5459 26.9796 24.6411 26.9177 24.746 26.8755C24.8509 26.8333 24.9634 26.8116 25.0769 26.8116C25.3066 26.8116 25.5268 26.9 25.6892 27.0573C25.8516 27.2146 25.9429 27.4279 25.9429 27.6504C25.943 27.7602 25.9205 27.869 25.8769 27.9704C25.8333 28.0718 25.7694 28.1638 25.6889 28.2412C25.6084 28.3186 25.5129 28.3798 25.4078 28.4213C25.3028 28.4628 25.1903 28.4837 25.0769 28.4829ZM19.8202 26.0412V6.43352H30.3337V26.0412H19.8202Z" fill="#2F2C28"/>
                                </svg>   
                            <? } else{?>
                                <svg width="49" height="35" viewBox="0 0 49 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30.9238 0H19.0569C14.2669 0.00493418 9.67456 1.85027 6.28752 5.13109C2.90049 8.4119 0.99545 12.8602 0.990356 17.5C0.99545 22.1398 2.90049 26.5881 6.28752 29.8689C9.67456 33.1497 14.2669 34.9951 19.0569 35H30.9238C35.7138 34.9951 40.3062 33.1497 43.6932 29.8689C47.0802 26.5881 48.9853 22.1398 48.9904 17.5C48.9853 12.8602 47.0802 8.4119 43.6932 5.13109C40.3062 1.85027 35.7138 0.00493418 30.9238 0ZM30.9238 34.5092H19.0569C14.4013 34.5042 9.93784 32.7106 6.64583 29.5218C3.35383 26.3331 1.50215 22.0096 1.49705 17.5C1.50215 12.9904 3.35383 8.66692 6.64583 5.47816C9.93784 2.2894 14.4013 0.495815 19.0569 0.490882H30.9238C35.5794 0.495815 40.0429 2.2894 43.3349 5.47816C46.6269 8.66692 48.4785 12.9904 48.4836 17.5C48.4785 22.0096 46.6269 26.3331 43.3349 29.5218C40.0429 32.7106 35.5794 34.5042 30.9238 34.5092Z" fill="#2F2C28"/>
                                    <path d="M26.3085 22.5887C24.8524 21.9456 23.3225 20.355 22.2802 18.2083C21.2378 16.0616 20.9524 13.8776 21.3629 12.3584C21.8038 12.4525 22.2597 12.4598 22.7035 12.3801L19.4963 5.76913C17.078 7.80091 17.2256 13.5359 20.0031 19.277C22.7805 25.0182 27.1937 28.7338 30.3112 28.1559L27.1039 21.5449C26.7709 21.8392 26.5007 22.1938 26.3085 22.5887Z" fill="#2F2C28"/>
                                    <path d="M28.4157 20.936L31.6223 27.5439C32.1271 27.0968 32.5151 26.5399 32.7543 25.9191L29.7657 20.9484C29.3214 20.8542 28.8618 20.8499 28.4157 20.936Z" fill="#2F2C28"/>
                                    <path d="M24.81 10.7243L22.7866 5.30932C22.1433 5.10723 21.4597 5.05612 20.7921 5.1602L23.9987 11.7713C24.3394 11.479 24.6154 11.1229 24.81 10.7243Z" fill="#2F2C28"/>
                                </svg> 
                            <?}?>
                        </div>
                    </div>
                <? } ?>


                <?php
                $emails = $user->getProps('email');
                foreach ($emails as $filed){ ?>
                    <div class="item">
                        <div class="name">
                            <?=Yii::$app->t->getT('front_temail_'.$filed['type'],\app\models\user\Props::$fields['email']['type'][$filed['type']])?>
                        </div>
                        <a href="mailto:<?=$filed['value']?>" class="value"><?=$filed['value']?> </a>
                        <div class="icon">
                            <svg width="49" height="35" viewBox="0 0 49 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M30.9238 0H19.0569C14.2666 0.00575581 9.67431 1.85162 6.28737 5.13264C2.90042 8.41366 0.995449 12.8619 0.990356 17.5015C0.99545 22.1409 2.90049 26.5888 6.28752 29.8694C9.67456 33.1499 14.2669 34.9951 19.0569 35H30.9238C35.7138 34.9951 40.3062 33.1499 43.6932 29.8694C47.0802 26.5888 48.9853 22.1409 48.9904 17.5015C48.9853 12.8619 47.0803 8.41366 43.6933 5.13264C40.3064 1.85162 35.7141 0.00575581 30.9238 0ZM30.9238 34.5092H19.0569C14.4013 34.5042 9.93784 32.7108 6.64583 29.5223C3.35383 26.3338 1.50215 22.0107 1.49705 17.5015C1.50214 12.9921 3.35377 8.66866 6.64568 5.47968C9.93759 2.29071 14.401 0.496556 19.0569 0.4908H30.9238C35.5797 0.496556 40.0431 2.29071 43.335 5.47968C46.6269 8.66866 48.4785 12.9921 48.4836 17.5015C48.481 22.0123 46.6305 26.3378 43.3382 29.5283C40.046 32.7188 35.581 34.5136 30.9238 34.5185V34.5092Z" fill="#2F2C28"/>
                                <path d="M12.4756 25.4136H37.813V8.97443H12.4756V25.4136ZM15.2242 23.5497L22.7645 17.5947L25.1411 19.3809L27.5145 17.5947L35.0515 23.5497H15.2242ZM35.8918 21.6859L29.1565 16.3584L35.8918 11.2763V21.6859ZM33.2234 10.8134L25.1411 16.9082L17.0555 10.8134H33.2234ZM14.3871 11.2825L21.1224 16.3646L14.3871 21.6952V11.2825Z" fill="#2F2C28"/>
                            </svg>   
                        </div>
                    </div>
                <? } ?>

                <?php
                $websites = $user->getProps('website');
                foreach ($websites as $filed){ ?>
                    <div class="item">
                        <div class="name">
                        <?=Yii::$app->t->getT('front_title_website','Website');?>
                        </div>
                        <a href="<?=$filed['value']?>" class="value"><?=$filed['value']?> </a>
                        <div class="icon">
                            <svg width="49" height="35" viewBox="0 0 49 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M30.943 0H19.0761C14.2814 0.000822082 9.68319 1.84502 6.29191 5.12733C2.90062 8.40964 0.993757 12.8615 0.990356 17.5046C0.99545 22.1432 2.90049 26.5903 6.28752 29.8702C9.67456 33.1502 14.267 34.9951 19.0569 35H30.9238C35.7138 34.9951 40.3062 33.1502 43.6932 29.8702C47.0802 26.5903 48.9853 22.1432 48.9904 17.5046C48.987 12.868 47.0854 8.42173 43.7024 5.14049C40.3195 1.85924 35.7311 0.0106862 30.943 0ZM30.943 34.503H19.0761C14.4205 34.4981 9.9571 32.705 6.6651 29.517C3.3731 26.3291 1.52141 22.0068 1.51631 17.4984C1.52141 12.9898 3.37303 8.66712 6.66494 5.47871C9.95685 2.2903 14.4202 0.496467 19.0761 0.490713H30.943C35.5989 0.496467 40.0624 2.2903 43.3543 5.47871C46.6462 8.66712 48.4978 12.9898 48.5028 17.4984C48.4978 22.0068 46.6461 26.3291 43.3541 29.517C40.0621 32.705 35.5986 34.4981 30.943 34.503Z" fill="#2F2C28"/>
                                <path d="M24.551 6.63412C21.8139 6.63659 19.1896 7.69019 17.2535 9.56384C15.3175 11.4375 14.2279 13.9782 14.2236 16.6288C14.2279 19.2794 15.3175 21.8201 17.2535 23.6938C19.1896 25.5674 21.8139 26.621 24.551 26.6235C27.2878 26.621 29.9119 25.5673 31.8474 23.6936C33.7829 21.8198 34.8718 19.2791 34.8752 16.6288C34.8718 13.9785 33.7829 11.4378 31.8474 9.56403C29.9119 7.69029 27.2878 6.63659 24.551 6.63412ZM20.9878 8.72747C20.4056 9.43845 19.9473 10.2368 19.6311 11.091C19.152 10.9533 18.6808 10.7905 18.2199 10.6034C19.0506 9.86316 19.9819 9.2362 20.9878 8.73991V8.72747ZM20.1539 15.93C20.195 14.8642 20.34 13.8045 20.5869 12.7651C21.6542 12.9842 22.7391 13.113 23.8294 13.1502V15.9455L20.1539 15.93ZM23.8294 17.3276V20.1229C22.7391 20.1601 21.6542 20.2889 20.5869 20.508C20.3396 19.4687 20.1946 18.409 20.1539 17.3431L23.8294 17.3276ZM17.2834 11.7029C17.9184 11.9794 18.5707 12.2169 19.2366 12.4141C18.9501 13.5671 18.7837 14.7449 18.7395 15.93H15.7439C15.8603 14.4174 16.3918 12.9624 17.2834 11.7153V11.7029ZM15.7375 17.3276H18.7395C18.7837 18.5127 18.9501 19.6905 19.2366 20.8435C18.5707 21.0406 17.9184 21.2782 17.2834 21.5547C16.3912 20.3079 15.8597 18.8527 15.7439 17.34L15.7375 17.3276ZM18.2199 22.6542C18.6814 22.4684 19.1524 22.3057 19.6311 22.1666C19.9459 23.0214 20.4042 23.82 20.9878 24.5301C19.9819 24.0339 19.0506 23.4069 18.2199 22.6666V22.6542ZM22.6363 25.0208C21.9342 24.036 21.3792 22.96 20.9878 21.8249C21.9248 21.6469 22.8751 21.5431 23.8294 21.5143L23.9256 25.2165C23.4914 25.1899 23.0601 25.1286 22.6363 25.0333V25.0208ZM23.8294 11.7588C22.8751 11.73 21.9248 11.6262 20.9878 11.4482C21.3792 10.3131 21.9342 9.23712 22.6363 8.25227C23.0584 8.15979 23.4874 8.09957 23.9192 8.07214L23.8294 11.7588ZM30.8854 10.6034C30.4246 10.791 29.9535 10.9538 29.4742 11.091C29.1593 10.2363 28.701 9.4377 28.1176 8.72747C29.1227 9.23193 30.0518 9.86727 30.879 10.6158L30.8854 10.6034ZM25.2695 15.9517V13.1564C26.3598 13.1193 27.4448 12.9904 28.512 12.7713C28.7619 13.8102 28.9069 14.8701 28.945 15.9362L25.2695 15.9517ZM28.945 17.3494C28.9074 18.4154 28.7624 19.4754 28.512 20.5142C27.4448 20.2951 26.3598 20.1663 25.2695 20.1291V17.3338L28.945 17.3494ZM26.4626 8.25849C27.1672 9.24192 27.7224 10.3182 28.1111 11.4544C27.1742 11.6327 26.2238 11.7366 25.2695 11.765L25.1764 8.06281C25.6095 8.09198 26.0396 8.15429 26.4626 8.24916V8.25849ZM25.1796 25.2227L25.2727 21.5205C26.227 21.5489 27.1774 21.6528 28.1143 21.8311C27.7256 22.9673 27.1704 24.0436 26.4658 25.027C26.0421 25.1236 25.6108 25.186 25.1764 25.2134L25.1796 25.2227ZM28.1143 24.5518C28.699 23.8424 29.1575 23.0437 29.471 22.1883C29.9499 22.3269 30.4209 22.4896 30.8822 22.6759C30.0507 23.4175 29.1184 24.0455 28.1111 24.5425L28.1143 24.5518ZM31.8188 21.5765C31.1839 21.2995 30.5315 21.0618 29.8655 20.8652C30.1546 19.7126 30.3222 18.5347 30.3659 17.3494H33.3646C33.2465 18.864 32.7116 20.3204 31.8155 21.5671L31.8188 21.5765ZM30.3659 15.9517C30.3222 14.7664 30.1546 13.5885 29.8655 12.4359C30.5315 12.2392 31.1839 12.0017 31.8188 11.7246C32.7148 12.9746 33.2485 14.4343 33.3646 15.9517H30.3659Z" fill="#2F2C28"/>
                        </svg> 
                        </div>
                    </div>
                <? } ?>


                <?php
$websites = $user->getProps('address');
if(!empty($websites)){

    ?>


                

                <?php
                //$websites = $user->getProps('address');
                foreach ($websites as $filed){
                    $imAddres = [];
                    $valueAddres = (!empty($filed['translate'][Yii::$app->t->lang['id']]) ? $filed['translate'][Yii::$app->t->lang['id']]['value'] : $filed['value']);
                    $curentAddress = unserialize($filed['value']);
                    
                    foreach ($curentAddress as $in=>$vAdres){
                        if(!empty($vAdres) and $in != 'type'){
                            $imAddres[] = $vAdres;
                        }
                    }
                    ?>


                    <div class="item">
                        <div class="name"><?=Yii::$app->t->getT('front_title_addresses','Addresses');?></div>
                        <div class="value">
                            <?=implode(', ',$imAddres)?>
                        </div>
                        <div class="icon">
                            <svg width="49" height="35" viewBox="0 0 49 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M30.943 0H19.0761C14.2828 -2.62825e-06 9.68553 1.84317 6.29433 5.12452C2.90314 8.40587 0.995457 12.857 0.990356 17.5C0.99545 22.1398 2.90049 26.5881 6.28752 29.8689C9.67456 33.1497 14.267 34.9951 19.0569 35H30.9238C35.7138 34.9951 40.3062 33.1497 43.6932 29.8689C47.0802 26.5881 48.9853 22.1398 48.9904 17.5C48.9853 12.8635 47.0829 8.41792 43.7 5.13764C40.3171 1.85736 35.7297 0.00986413 30.943 0ZM30.943 34.5091H19.0761C14.4205 34.5042 9.9571 32.7106 6.6651 29.5218C3.3731 26.333 1.52141 22.0096 1.51631 17.5C1.52141 12.9904 3.3731 8.66695 6.6651 5.47819C9.9571 2.28943 14.4205 0.495815 19.0761 0.490881H30.943C35.5986 0.495815 40.0621 2.28943 43.3541 5.47819C46.6461 8.66695 48.4978 12.9904 48.5028 17.5C48.4978 22.0096 46.6461 26.333 43.3541 29.5218C40.0621 32.7106 35.5986 34.5042 30.943 34.5091Z" fill="#2F2C28"/>
                                <path d="M24.6407 5.62314H24.5541C23.3865 5.60547 22.2269 5.81337 21.1431 6.23477C20.0594 6.65617 19.0732 7.28259 18.2423 8.07739C17.4125 8.87191 16.755 9.81905 16.3083 10.8631C15.8617 11.9071 15.6348 13.0271 15.6411 14.1572C15.6411 20.8366 22.5336 27.9105 24.0121 28.9233L24.5541 29.2961L25.0962 28.9233C26.5747 27.9105 33.4672 20.8459 33.4672 14.1572C33.4735 13.0271 33.2466 11.9071 32.7999 10.8631C32.3533 9.81905 31.6958 8.87191 30.866 8.07739C30.0457 7.29226 29.0736 6.67143 28.0055 6.25032C26.9373 5.8292 25.794 5.61607 24.6407 5.62314ZM24.5541 26.9692C22.7452 25.2854 17.5238 19.5939 17.5238 14.1572C17.5178 13.2681 17.6954 12.3868 18.0463 11.5651C18.3971 10.7435 18.9141 9.99814 19.5668 9.37293C20.2133 8.75533 20.9793 8.26729 21.8208 7.93677C22.6622 7.60626 23.5627 7.4397 24.4707 7.44673H24.6375C25.5456 7.43919 26.4463 7.60547 27.2878 7.93601C28.1294 8.26656 28.8953 8.75491 29.5415 9.37293C30.1942 9.99814 30.7112 10.7435 31.062 11.5651C31.4129 12.3868 31.5905 13.2681 31.5845 14.1572C31.5845 19.5939 26.363 25.2854 24.5541 26.9692Z" fill="#2F2C28"/>
                                <path d="M24.5574 9.49408C23.2815 9.49408 22.0578 9.98502 21.1556 10.8589C20.2534 11.7329 19.7465 12.9182 19.7465 14.1541C19.7465 15.39 20.2534 16.5754 21.1556 17.4493C22.0578 18.3232 23.2815 18.8141 24.5574 18.8141C25.8334 18.8141 27.0571 18.3232 27.9593 17.4493C28.8615 16.5754 29.3683 15.39 29.3683 14.1541C29.3683 12.9182 28.8615 11.7329 27.9593 10.8589C27.0571 9.98502 25.8334 9.49408 24.5574 9.49408ZM24.5574 16.9874C23.7813 16.9858 23.0375 16.6865 22.4888 16.1549C21.94 15.6233 21.6309 14.9028 21.6292 14.151C21.6309 13.3992 21.94 12.6788 22.4888 12.1472C23.0375 11.6156 23.7813 11.3163 24.5574 11.3146C25.3332 11.3163 26.0767 11.6157 26.625 12.1474C27.1733 12.679 27.4817 13.3995 27.4825 14.151C27.4817 14.9025 27.1733 15.623 26.625 16.1546C26.0767 16.6863 25.3332 16.9858 24.5574 16.9874Z" fill="#2F2C28"/>
                            </svg>                                                 
                        </div>
                    </div>
                <? } ?>

                      
<?}?>

                

            </div>


            <?php
            $websites = $user->getProps('socialmedia');
            if(!empty($websites)){
            ?>

            <div class="smm">
                <div class="title">SOCIAL MEDIA</div>
                <div class="link">
                    <? foreach ($websites as $filed){ ?>
                        <? if(file_exists($_SERVER['DOCUMENT_ROOT'].'/web/tpl/img/'.$filed['type'].'.svg')){?>
                            <a href="<?=$filed['value']?>" target="_blank">
                                <?=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/web/tpl/img/'.$filed['type'].'.svg');?> 
                            </a>
                        <?}?>
                    <?}?>
                    
                </div>
            </div>
<br>
            <div class="smm">
                <div class="title">GET DIRECTION</div>
                <div class="link">
                <a href="https://maps.app.goo.gl/p39n1m9wc5RpqZeS7">
                <img src="https://adterminals.1971.host/web/tpl/img/location.svg">
                </a>
            </div>
            </div>
            <?}?>


            <a href="<?=$user->vCard?>" class="add_contact"><span>Add to Contacts</span></a>
            
        </div>
     
        
    </div>


    <? \app\models\user\Stat::addView($user->id);?>

    <? if(!empty($user->company->jscode)){
        echo htmlspecialchars_decode($user->company->jscode);
    }?>

  