<?php

namespace app\modules\shortLink\components\web;

use app\modules\shortLink\models\ShortLink;
use yii\base\BaseObject;
use yii\web\Request;
use yii\web\UrlManager;
use yii\web\UrlRuleInterface;

class ShortLinkRule extends BaseObject implements UrlRuleInterface
{
    /**
     * @var string
     */
    public $action;
    
    /**
     * @var string
     */
    public $paramName;
    
    /**
     * @param UrlManager $manager
     * @param string $route
     * @param array $params
     *
     * @return bool|string
     */
    public function createUrl($manager, $route, $params)
    {
        return false;
    }
    
    /**
     * @param UrlManager $manager
     * @param Request $request
     *
     * @return array|bool
     */
    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();
        
        if (preg_match('/^[A-Za-z0-9]{6}$/', $pathInfo, $matches)) {
            $uid = $matches[0];
            $shortLink = ShortLink::findOne($uid);
            if ($shortLink) {
                return [$this->action, [$this->paramName => $uid]];
            }
        }
        
        return false;
    }
}
