<?php


namespace app\modules\lang\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Cookie;

class SelectController extends Controller
{
    public function actionIndex()
    {
        $language = Yii::$app->request->post('language');
        Yii::$app->language = $language;

        $languageCookie = new Cookie([
            'name' => 'language',
            'value' => $language,
            'expire' => time() + 3600 * 24 * 30,
        ]);
        Yii::$app->response->cookies->add($languageCookie);

        $localeCookie = new Cookie([
            'name' => 'locale',
            'value' => Yii::$app->params['formattedLanguages'][$language]['locale'],
            'expire' => time() + 3600 * 24 * 30,
        ]);
        Yii::$app->response->cookies->add($localeCookie);

        $calendarCookie = new Cookie([
            'name' => 'calendar',
            'value' => Yii::$app->params['formattedLanguages'][$language]['calendar'],
            'expire' => time() + 3600 * 24 * 30,
        ]);
        Yii::$app->response->cookies->add($calendarCookie);
    }
}