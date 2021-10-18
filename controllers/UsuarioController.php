<?php

namespace app\controllers;

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
		$user->save(false);
        //me hacen falta llenar datos en tabla  usuario la id de user
        $usuario->usu_fkuser = $user->id;   
        $usuario->save();
            // echo('<pre>');
            // var_dump($this->request->post());
            // echo('</pre>');
            // die;
        return $this->redirect(['view', 'id' => $usuario->usu_id]);
        }
        // direcciona a esta vista con render
        return $this->render('registrar', compact('usuario','user'));
    }


}
