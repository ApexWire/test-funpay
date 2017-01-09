<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class ApiController extends Controller
{
    /**
     * @return string
     */
    public function actionHtml()
    {
        return $this->renderPartial('/site/about');
    }
}
