<?php

namespace app\modules\shortLink;

use Yii;
use app\modules\shortLink\services\LinkManager;

trait ContainerTrait
{
    protected function getLinkManager(): LinkManager
    {
        /** @var LinkManager $lm */
        $lm = Yii::createObject(LinkManager::class);
        
        return $lm;
    }
}
