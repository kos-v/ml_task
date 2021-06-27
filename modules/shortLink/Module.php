<?php

namespace app\modules\shortLink;

use yii\base\BootstrapInterface;
use yii\base\Module as BaseModule;

class Module extends BaseModule implements BootstrapInterface
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\shortLink\controllers';
    
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
    
    /**
     * @param \yii\base\Application $app
     */
    public function bootstrap($app)
    {
        require __DIR__ . '/config/di.php';
    }
}
