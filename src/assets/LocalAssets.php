<?php

namespace mazurva\nestable2\assets;

use yii\web\AssetBundle;

class LocalAssets extends AssetBundle
{
    public $css = [
        'css/nestable.css'
    ];
    public $js = [
        'js/jquery.nestable.js'
    ];
    public $depends = [
        NestableAsset::class
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/../web/';
        parent::init();
    }
}