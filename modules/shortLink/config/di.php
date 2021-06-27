<?php

use app\modules\shortLink\components\uidGenerator\DbUniqueChecker;
use app\modules\shortLink\components\uidGenerator\Generator;
use app\modules\shortLink\components\uidGenerator\GeneratorInterface;
use app\modules\shortLink\components\uidGenerator\UniqueCheckerInterface;
use app\modules\shortLink\models\ShortLink;

Yii::$container->setDefinitions([
    UniqueCheckerInterface::class => new DbUniqueChecker(ShortLink::class, 'uid'),
    GeneratorInterface::class => Generator::class,
]);
