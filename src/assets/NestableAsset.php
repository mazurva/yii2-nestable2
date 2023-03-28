<?php

/**  
 * @package yii2-nestable2
 * @version 1.0
 */

namespace mazurva\nestable2\assets;

/**
 * Nestable bundle for \mazurva\nestable2
 * 
 * @author Vadim Mazur <mazurva@gmail.com>
 * @since 1.0
 */
class NestableAsset extends \kartik\base\AssetBundle {

	public $sourcePath = '@vendor/npm-asset/nestable2/dist';
    public $css = [
        'jquery.nestable.min.css',
    ];
    public $js = [
        'jquery.nestable.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];

}
