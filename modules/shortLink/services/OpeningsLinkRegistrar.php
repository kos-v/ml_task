<?php

namespace app\modules\shortLink\services;

use app\modules\shortLink\models\ShortLink;

class OpeningsLinkRegistrar
{
    public function register(ShortLink $link): void
    {
        $link->openings_count++;
        $link->save();
    }
}
