<?php

namespace app\modules\lang;

use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;

/**
 * auth module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\lang\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $preferredLanguage = isset($app->request->cookies['language']) ? (string)$app->request->cookies['language'] : $app->language;
        $preferredLocale = isset($app->request->cookies['locale']) ? (string)$app->request->cookies['locale'] : $app->params['formattedLanguages'][$preferredLanguage]['locale'];
        $preferredCalendar = isset($app->request->cookies['calendar']) ? (string)$app->request->cookies['calendar'] : $app->params['formattedLanguages'][$preferredLanguage]['calendar'];
        $preferredDateFormat = isset($app->request->cookies['dateFormat']) ? (string)$app->request->cookies['dateFormat'] : $app->params['formattedLanguages'][$preferredLanguage]['dateFormat'];

        $app->language = $preferredLanguage;
        $app->formatter->locale = $preferredLocale;
        $app->formatter->calendar = (int)$preferredCalendar;
        $app->formatter->dateFormat = $preferredDateFormat;
    }
}
