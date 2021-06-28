<?php

namespace app\modules\shortLink\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "short_links".
 *
 * @property string $uid
 * @property string $link
 */
class ShortLink extends ActiveRecord
{
    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'link' => 'Link',
        ];
    }
    
    /**
     * @return ShortLinksQuery
     */
    public static function find()
    {
        return new ShortLinksQuery(get_called_class());
    }
    
    /**
     * @retrun array
     */
    public function rules()
    {
        return [
            [['uid', 'link'], 'required'],
            ['uid', 'string', 'max' => 255],
            ['uid', 'unique'],
            ['link', 'string', 'max' => 2048],
            ['link', 'url'],
        ];
    }
    
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'short_links';
    }
}
