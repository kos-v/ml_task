<?php

namespace app\modules\shortLink\components\uidGenerator;

interface GeneratorInterface
{
    public function generate(bool $unique = true, int $length = 6): string;
}
