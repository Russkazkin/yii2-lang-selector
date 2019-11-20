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

    /**
     * Converts timestamp into date in active app language format
     * @param $timestamp unix format date
     * @return false|string
     */
    public function timestampToDate ($timestamp) {
        return date($this->phpDateFormat, $timestamp);
    }

}