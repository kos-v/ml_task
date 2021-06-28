<?php

namespace app\modules\shortLink\controllers\api\v1;

use Yii;
use app\modules\shortLink\controllers\api\BaseController;
use yii\helpers\Url;
use yii\web\Response;

class LinkController extends BaseController
{
    public function actionGet(string $uid): Response
    {
        $shortLink = $this->getLinkManager()->find($uid);
        if (!$shortLink) {
            return $this->responseNotFound('Link not found');
        }
        
        return $this->response([
            'originalLink' => $shortLink->link,
            'openingsCount' => 0,
        ]);
    }
    
    public function actionCreate(): Response
    {
        $url = Yii::$app->request->post('url', '');
        
        if ($err = $this->getLinkManager()->validateLink($url)) {
            return $this->responseNotValid(['url' => $err]);
        }
        
        return $this->response([
            'uid' => Url::base(true) . '/' . $this->getLinkManager()->create($url)
        ]);
    }
}
