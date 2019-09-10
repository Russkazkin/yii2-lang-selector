<?php


namespace app\modules\lang\assets;


use yii\web\AssetBundle;

class LangAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/lang/resources';

    public $css = [
        'css/lang.css',
    ];
    public $js = [
        'js/lang.js',
    ];
}