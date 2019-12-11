<?php


namespace app\modules\lang\behaviors;


use DateTime;
use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class LangDateBehavior extends Behavior
{
    public $attributeName;
    public $format;
    public $phpFormat;

    public function init()
    {
        parent::init();

        $this->format = Yii::$app->language == 'en-US' ? 'mm-dd-yyyy' : 'dd-mm-yyyy';
        $this->phpFormat = substr(Yii::$app->formatter->dateFormat, 4, 5);
    }

    public function events()
    {
        return [ActiveRecord::EVENT_BEFORE_VALIDATE => 'phpToTimestamp'];
    }

    public function phpToTimestamp()
    {
        $date = DateTime::createFromFormat($this->phpFormat, $this->owner->{$this->attributeName});

        if ($date) {
            $this->owner->{$this->attributeName} = $date->getTimestamp();
        }
    }
}
