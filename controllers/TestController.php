<?php

namespace app\controllers;

use app\forms\SnilsForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class TestController extends Controller
{
    /**
     * @return Response|string
     */
    public function actionIndex(): Response|string
    {
        $model = new SnilsForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['success']);
        }

        return $this->render('index', ['model' => $model]);
    }

    public function actionSuccess(): string
    {
        return $this->render('success');
    }
}