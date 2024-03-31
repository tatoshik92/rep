<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AcpAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/roboto/stylesheet.css',
        '/panel_assets/plugins/global/plugins.bundle.css',
        '/panel_assets/css/style.bundle.css',
        '/panel_assets/custom/profile/edit.css'
    ];
    public $js = [
        '/panel_assets/js/jquery-3.6.0.min.js',
        '/panel_assets/plugins/global/plugins.bundle.js',
        '/panel_assets/js/scripts.bundle.js',
    ];
    public $depends = [

    ];
}
