<?php


namespace app\modules\lang\components;


use Yii;
use yii\base\BaseObject;

class LangDateComponent extends BaseObject
{
    public $phpDateFormat;

    public function init()
    {
        parent::init();

        $this->phpDateFormat = substr(Yii::$app->formatter->dateFormat, 4, 5);
    }

    public function timestampToDate ($timestamp) {
        return date($this->phpDateFormat, $timestamp);
    }

}