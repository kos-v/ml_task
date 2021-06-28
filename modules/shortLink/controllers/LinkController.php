<?php

namespace app\modules\shortLink\controllers;

use app\modules\shortLink\ContainerTrait;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class LinkController extends Controller
{
    use ContainerTrait;
    
    public function actionOpen(string $uid): Response
    {
        $shortLink = $this->getLinkManager()->find($uid);
        if (!$shortLink) {
            throw new NotFoundHttpException(sprintf("Short link \"%s\" not found", $uid));
        }
        
        $this->getOpeningsLinkRegistrar()->register($shortLink);
        
        return $this->redirect($shortLink->link, 303);
    }
}
