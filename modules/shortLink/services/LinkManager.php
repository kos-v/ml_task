<?php

namespace app\modules\shortLink\services;

use app\modules\shortLink\components\uidGenerator\GeneratorInterface;
use app\modules\shortLink\models\ShortLink;

class LinkManager
{
    /**
     * @var GeneratorInterface
     */
    private $uidGenerator;
    
    public function __construct(GeneratorInterface $uidGenerator)
    {
        $this->uidGenerator = $uidGenerator;
    }
    
    public function create(string $link): string
    {
        $shortLink = new ShortLink();
        $shortLink->uid = $this->uidGenerator->generate();
        $shortLink->link = $link;
        
        if (!($shortLink->validate() && $shortLink->save())) {
            throw new \Exception('Failed to save ShortLink object');
        }
        
        return $shortLink->uid;
    }
    
    public function find(string $uid): ?ShortLink
    {
        return ShortLink::findOne($uid);
    }
    
    public function validateLink(string $link): ?string
    {
        $shortLink = new ShortLink();
        $shortLink->link = $link;
        
        if (!$shortLink->validate('link')) {
            return $shortLink->getFirstError('link');
        }
        
        return null;
    }
}
