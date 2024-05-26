<?php

namespace app\controllers;

use app\models\Afisha;
use app\models\Animal;
use app\models\Beast;
use app\models\Diagnoz;
use app\models\FoodSearch;
use app\models\Mealschedule;
use app\models\MealscheduleSearch;
use app\models\RaspisanieSearch;
use app\models\SignupForm;
use app\models\Ticket;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'kormilshic', 'raspisanie'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['kormilshic'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return \Yii::$app->user->identity->isKormilshic();
                        }
                    ],
                    [
                        'actions' => ['raspisanie'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return \Yii::$app->user->identity->isSotrudnik() ||
                                \Yii::$app->user->identity->isPovar() ||
                                \Yii::$app->user->identity->isDirector() ||
                                \Yii::$app->user->identity-> isKormilshic() ||
                                \Yii::$app->user->identity->isVeterinar();
                        }
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $beast = Beast::find()->all();
        return $this->render('index', ['beast' => $beast]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {


        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';


        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()){
            return $this->goHome();
        }
        return $this->render('signup', ['model'=>$model]);
    }
    public function actionAfisha()
    {
        $afisha = Afisha::find()->all();
        return $this->render('afisha', ['afisha' => $afisha]);
    }
    public function actionBeast()
    {
        $classId = Yii::$app->request->get('tb_class_id');
        $query = Beast::find()->joinWith('tbClass');

        if ($classId) {
            $query->andWhere(['tb_class_id' => $classId]);
        }

        $beast = $query->all();

        return $this->render('beast', ['beast' => $beast]);
    }


    public function actionAnimal($id)
    {

        $animal = Animal::findOne($id);
        $model = Beast::findOne($id);
        if ($model !== null) {
            // Извлечение всех имен животных с указанным beast_id
            $animalNames = Animal::find()
                ->where(['beast_id' => $id])
                ->select(['name', 'description', 'year', 'nickname'])
                ->all();

            return $this->render('animal', [
                'model' => $model,
                'animal' => $animal,
                'animalNames' => $animalNames,
                'beastName' => $model->name,
                'beastDescription' => $model->description,
                'beastYear' => $animal->year,

                // Имя животного по id из таблицы beast
            ]);
        } else {
            throw new NotFoundHttpException('The requested animal does not exist.');
        }
    }

    public function actionTicket($id)
    {

        $afisha = Afisha::findOne($id);


        $ticket = new Ticket();
        $ticket->name_id = $afisha->id;
        $ticket->user_id = Yii::$app->user->id;


        if ($ticket->save()) {
            Yii::$app->session->setFlash('success', 'Билет успешно куплен!');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка при покупке билета');
        }

        return $this->render('ticket', ['ticket' => $ticket]);
    }
    public function actionKormilshic()
    {
        $searchModel = new FoodSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $rasp = Mealschedule::find()->all();
        return $this->render('kormilshic', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'rasp' => $rasp,
        ]);
    }

    public function actionRaspisanie()
    {
        $searchModel = new RaspisanieSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('raspisanie', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

}
