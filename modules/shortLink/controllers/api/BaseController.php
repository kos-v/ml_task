<?php

namespace app\modules\shortLink\controllers\api;

use Yii;
use app\modules\shortLink\ContainerTrait;
use yii\rest\Controller;
use yii\web\Response;

class BaseController extends Controller
{
    use ContainerTrait;
    
    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        
        return $behaviors;
    }
    
    public function response(array $data, int $code = 200): Response
    {
        Yii::$app->response->statusCode = $code;
        return $this->asJson($data);
    }
    
    public function responseCreated(array $data): Response
    {
        return $this->response($data, 201);
    }
    
    public function responseNotFound(string $error): Response
    {
        return $this->response(['error' => $error], 404);
    }
    
    public function responseNotValid(array $errors): Response
    {
        return $this->response(['validateErrors' => $errors], 422);
    }
}
