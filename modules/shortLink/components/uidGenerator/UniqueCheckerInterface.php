<?php

namespace app\modules\shortLink\components\uidGenerator;

interface UniqueCheckerInterface
{
    public function isUnique(string $uid): bool;
}
