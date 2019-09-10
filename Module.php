<?php

namespace app\modules\lang;

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
    public $supportedLanguages = [];

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
        $preferredLanguage = isset($app->request->cookies['language']) ? (string)$app->request->cookies['language'] : null;
        $preferredLocale = isset($app->request->cookies['locale']) ? (string)$app->request->cookies['locale'] : null;
        $preferredCalendar = isset($app->request->cookies['calendar']) ? (string)$app->request->cookies['calendar'] : null;

        if (empty($preferredLanguage)) {
            $preferredLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
        }
        $app->language = $preferredLanguage;
        $app->formatter->locale = $preferredLocale;
        $app->formatter->calendar = (int)$preferredCalendar;
    }
}
