<?php

namespace app\modules\shortLink\components\uidGenerator;

class Generator implements GeneratorInterface
{
    /**
     * @var UniqueCheckerInterface
     */
    private $uniqueChecker;
    
    public function __construct(UniqueCheckerInterface $uniqueChecker)
    {
        $this->uniqueChecker = $uniqueChecker;
    }
    
    public function generate(bool $unique = true, int $length = 6): string
    {
        do {
            $uid = $this->generateRandom($length);
            if (!$unique || $this->uniqueChecker->isUnique($uid)) {
                return $uid;
            }
            
        } while (true);
    }
    
    private function generateRandom(int $length): string
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charactersLen = strlen($characters);
        
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= $characters[random_int(0, $charactersLen - 1)];
        }
        
        return $result;
    }
}
