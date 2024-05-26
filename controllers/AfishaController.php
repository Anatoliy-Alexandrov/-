<?php

namespace app\controllers;

use app\models\Afisha;
use app\models\AfishaSearch;
use app\models\Orders;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AfishaController implements the CRUD actions for Afisha model.
 */
class AfishaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Afisha models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $afisha = Afisha::find()->all();
        $searchModel = new AfishaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'afisha' => $afisha,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Afisha model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Afisha model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Afisha();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Afisha model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Afisha model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Afisha model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Afisha the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Afisha::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionOrders()
    {
        $model = new Orders();
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        if ($this->request->isPost) {
            $afisha = Afisha::findOne(Yii::$app->request->post()['id']);
            if ($afisha->tickets<Yii::$app->request->post()['tickets']) {
                Yii::$app->session->setFlash('danger', 'Невозможно заказать: доступных билетов меньшь');
                return $this->redirect(['view', 'id' => $afisha->id]);
                $afisha->tickets = $afisha->tickets - Yii::$app->request->post()['tickets'];
                $afisha->save();
            }

            $model->afisha_id = Yii::$app->request->post('id');
            $model->tickets = Yii::$app->request->post('tickets');
          //  $model->name = Yii::$app->request->post('name');
           // $model->surname = Yii::$app->request->post('surname');

            $model->save();
            Yii::$app->session->setFlash('success', 'Билеты заказаны');
            return $this->redirect(['index']);
        }
    }
}
