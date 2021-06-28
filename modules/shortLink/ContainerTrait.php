<?php

namespace app\modules\shortLink;

use Yii;
use app\modules\shortLink\services\LinkManager;
use app\modules\shortLink\services\OpeningsLinkRegistrar;

trait ContainerTrait
{
    protected function getLinkManager(): LinkManager
    {
        /** @var LinkManager $lm */
        $lm = Yii::createObject(LinkManager::class);
        
        return $lm;
    }
    
    protected function getOpeningsLinkRegistrar(): OpeningsLinkRegistrar
    {
        /** @var OpeningsLinkRegistrar $or */
        $or = Yii::createObject(OpeningsLinkRegistrar::class);
        
        return $or;
    }
}
