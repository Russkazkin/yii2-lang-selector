<?php


namespace app\modules\lang\widgets\selector;


use app\modules\lang\assets\LangAsset;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class LanguageSelectorWidget extends Widget
{
    public function run()
    {
        LangAsset::register($this->getView());

        echo Html::beginForm(['/lang/select'], 'post', [
            'enctype' => 'multipart/form-data',
            'id' => 'lang-form',
            'class' => 'lang-switch-form'
        ]);
        echo Html::radioList('language',
            Yii::$app->language,
            ['en-US' => 'ENG', 'ru-RU' => 'РУС'],
            ['class' => 'lang-switch']);
        echo Html::endForm();
    }
}