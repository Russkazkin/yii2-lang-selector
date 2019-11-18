# yii2-lang-selector
Yii2 module for language selection

# Installation
* Add this to web.php 'modules' section:

        'lang' => [
                    'class' => 'app\modules\lang\Module',
                    'components' => [
                        'dateManager' => \app\modules\lang\components\LangDateComponent::class,
                    ]
                ],

* Add 'lang' to web.php 'bootstrap' section
* Add this to your layout to show language switch:

    `echo LanguageSelectorWidget::widget();`