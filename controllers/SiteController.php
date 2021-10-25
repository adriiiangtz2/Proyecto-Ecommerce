<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\Producto;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use webvimark\modules\UserManagement\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
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
 public $id;
     //funcion para asignar vista de usuario y superadmin
    public function actionIndex($id=null)
    {

        $vista = 'usuario/index';
        // echo('<pre>');
        // var_dump($vista );
        // echo('</pre>');
        // die;
        if (User::hasRole('Admin')) {
            $vista = 'superadmin/index';
            return $this->render($vista);
        }
        else if(User::hasRole('Usuario')){
            $vista = 'usuario/index';
            return $this->render($vista, compact('id') );
        }
        return $this->render($vista);
    }



    public function actionMenu()
    {
        return $this->render('botonera');
    }

    public function actionFavorito()
    {
        return $this->render('favorito');
    }
    public function actionProductos()
    {
        return $this->render('producto');
    }

    //Redirecciona el home , pero no muestra la imagen

    public function actionPrincipal()
    {
        return $this->render('/site/usuario/index');
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
    public function actionStars()
    {
        $model = Producto::find()->where(['pro_id' => $_POST['id']])->one();
        
        if (!empty($model)){
            $model->estrellas = $_POST['stars'];
            if ($model->save()){
                return true;
            }
        }
        return false;
    }

}
