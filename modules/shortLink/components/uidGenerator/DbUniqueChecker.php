<?php

namespace app\modules\shortLink\components\uidGenerator;

use InvalidArgumentException;
use yii\db\ActiveRecord;

class DbUniqueChecker implements UniqueCheckerInterface
{
    private const DEFAULT_UID_FIELD = 'uid';

    /**
     * @var string
     */
    private $modelClass;

    /**
     * @var string
     */
    private $uidField;
    
    public function __construct(string $modelClass, string $uidField = self::DEFAULT_UID_FIELD)
    {
        if (!is_subclass_of($modelClass, ActiveRecord::class)) {
            throw new InvalidArgumentException(sprintf(
                'Argument $modelClass must take the name of the child class %s', ActiveRecord::class
            ));
        }

        $this->modelClass = $modelClass;
        $this->uidField = $uidField;
    }
    
    public function isUnique(string $uid): bool
    {
        $modelClass = $this->modelClass;
        
        /** @var ActiveRecord|null $model */
        $model = $modelClass::findOne([$this->uidField => $uid]);

        return $model === null;
    }
}
