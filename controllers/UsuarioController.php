<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\Usuario;
use yii\web\Controller;
use app\models\UsuarioSearch;
use yii\web\NotFoundHttpException;
use webvimark\modules\UserManagement\models\User;
// use yii\filters\VerbFilter;
// use yii\helpers\ArrayHelper;


/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    //se crea esta variable que se usara en site/usuario/header 
    //permide darle acciones a esa vista y ponerla a como la url
    public $freeAccessActions = ['registrar-usuario'];
    /**
     * @inheritDoc
     */
   
    public function behaviors()
    {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->usu_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->usu_id]);
        }

        
        return $this->render('update',compact('model'));
        // 'model' => $model,
    }
    
    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRegistrarUsuario(){
        //todo lo del modelo se guarda (datos)en esas variables
        $usuario = new Usuario();
        $user    = new User();
        //para guardar, cargar usuario y user al modelo, esto se toma de la funcion update
        if ($this->request->isPost && $usuario->load($this->request->post()) && $user->load($this->request->post())) {
            //copia codigo de wevimark/migrations/insert
            $user->status = User::STATUS_ACTIVE;
            //guarda y al mismo tiempo le asigna el rol
            if($user->save()){
                User::assignRole($user->id, 'Usuario');
            }
            //me hacen falta llenar datos en tabla  usuario la id de user
            $usuario->usu_fkuser = $user->id;   
            $usuario->save();    
            // Aqui se redirecciona una vez que guarde el usuario 
            return $this->redirect(['/', 'id' => $usuario->usu_id]);
        }
        // direcciona a esta vista con render
        return $this->render('registrar', compact('usuario','user'));
    }
    public function actionRegistraradmin(){
        //todo lo del modelo se guarda (datos)en esas variables
        $usuario = new Usuario();
        $user    = new User();
        //para guardar, cargar usuario y user al modelo, esto se toma de la funcion update
        if ($this->request->isPost && $usuario->load($this->request->post()) && $user->load($this->request->post())) {
            //copia codigo de wevimark/migrations/insert
            $user->status = User::STATUS_ACTIVE;
            //guarda y al mismo tiempo le asigna el rol
            if($user->save()){
                User::assignRole($user->id, 'Administrador2');
            }
            //me hacen falta llenar datos en tabla  usuario la id de user
            $usuario->usu_fkuser = $user->id;   
            $usuario->save();    
            // Aqui se redirecciona una vez que guarde el usuario 
            // return $this->redirect(['/', 'id' => $usuario->usu_id]);
        }
        // direcciona a esta vista con render
        return $this->render('registraradmin', compact('usuario','user'));
    }

    public function actionBotonera()
    {
        return $this->render('botonera');
    }
    public function actionInformacion()
    {
        $id=Usuario::usuario();
        $usua = Usuario::findOne(['usu_id' => $id]);
        return $this->render('informacion');
    }

    public function actionDato()
    {
        $id=$this->request->post('id');
        $usuario = Usuario::find()->where(['usu_id' => $id]) -> one(); 
        $usuario -> usu_nombre = $this->request->post('nombre');
        $usuario -> usu_paterno = $this->request->post('paterno');
        $usuario -> usu_materno = $this->request->post('materno');
        $usuario -> save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON; 
        $response->data = ['html' => $this->renderPartial('info-datos',compact('usuario'))];
        return $response;
    }
    public function actionDato2()
    {
        $id=$this->request->post('id');
        $usuario = Usuario::find()->where(['usu_id' => $id]) -> one(); 
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON; 
        $response->data = ['html' => $this->renderPartial('titulo',compact('usuario'))];
        return $response;
    }
    public function actionAcceso()
    {
        $id=$this->request->post('id');
        $user = User::find()->where(['id' => $id]) -> one();
        $user->username = $this->request->post('username');
        $user->password = $this->request->post('password');
        $user->email    = $this->request->post('correo');
        $user->save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON; 
        $response->data = ['html' => $this->renderPartial('info-acceso',compact('user'))];
        return $response;
    }
    //funcion para eliminar cuenta 
    public function actionEstatus()
    {
        //EL ESTATUS NO SE PUEDE CAMBIAR POR QUE LO TIENE QUE HACER OTRO ROL
        // $user=Yii::$app->user->identity;
        //TRAE EL USUARIO LOGEADO 
        $user=User::findOne(Yii::$app->user->id);
        $user->username = 'USERNAMEINDESCIFRABLE';   
        //cambia nsu contraseña para que no l reconozca 
        $user->password = 'CONTRASEÑAINDESCIFRABLE';    
        $user->update();
        // echo('<pre>');
        // var_dump($user->errors);
        // var_dump($user);
        // echo('</pre>');
        // die;

        // $user=User::findOne(12);
        // $user->status = 0;
        // $user->superadmin = 0;
        // $user->password = '1234567890';    
        // $user->update();
        // echo('<pre>');
        // var_dump($user->errors);
        // var_dump($user);
        // echo('</pre>');
        // die;
      
        
        return $this->redirect(['/usuario/registrar-usuario']);
    }


}