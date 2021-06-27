<?php

namespace app\modules\shortLink\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[ShortLink]].
 *
 * @see ShortLink
 */
class ShortLinksQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return ShortLink[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ShortLink|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
