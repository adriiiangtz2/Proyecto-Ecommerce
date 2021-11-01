<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\Usuario;
use yii\web\Controller;
use app\models\CatTarjeta;
use yii\filters\VerbFilter;
use app\models\CatTarjetaSearch;
use yii\web\NotFoundHttpException;

/**
 * CatTarjetaController implements the CRUD actions for CatTarjeta model.
 */
class CatTarjetaController extends Controller
{
    /**
     * @inheritDoc
     */
    // public function behaviors()
    // {
    //     return array_merge(
    //         parent::behaviors(),
    //         [
    //             'verbs' => [
    //                 'class' => VerbFilter::className(),
    //                 'actions' => [
    //                     'delete' => ['POST'],
    //                 ],
    //             ],
    //         ]
    //     );
    // }

    public function behaviors()
{
	return [
		'ghost-access'=> [
			'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
		],
	];
}
    /**
     * Lists all CatTarjeta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatTarjetaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatTarjeta model.
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
     * Creates a new CatTarjeta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatTarjeta();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->tar_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatTarjeta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tar_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatTarjeta model.
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
     * Finds the CatTarjeta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatTarjeta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CatTarjeta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRegistrar()
    {
        $model = new CatTarjeta();
      
        if ($this->request->isPost && $model->load($this->request->post()) ) {     
            $model->tar_fkusuario = Usuario::usuario()->usu_id;
            $model->save();
        }
    
        return $this->render('registrar', compact('model'));
    }



    public function actionMostrar()
    {
        return $this->render('mostrar');
    }

    public function actionEditar()
    {
        $id=$this->request->post('id');
        $CatTarjeta = CatTarjeta::find()->where(['tar_id' => $id]) -> one(); 
    
        $CatTarjeta -> tar_expiracion = $this->request->post('expiracion');
        $CatTarjeta -> save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON; 
        $response->data = ['html' => $this->renderPartial('editar')];
        return $response;
    }
    //REGISTRA UNA TARJETA DE UN USUARIO DE LA TABLA TARJETA
    public function actionRegistrartarjeta()
    {
        // MOSTRAR
        //estos nados le llegan al js y se remplazan por los id que llegan
        $model = new CatTarjeta();
        $model->tar_numtarjeta = $this->request->post('numtarjeta');
        $model->tar_expiracion = $this->request->post('expiracion');
        $model->tar_fkusuario = Usuario::usuario()->usu_id;
        $model->tar_financiera = $this->request->post('financiera');
        $model->tar_tipo = $this->request->post('tipo');
        $model->tar_nombre = $this->request->post('nombre');
        $model->save();
        $response = Yii::$app->response; //Obtenemos los datos de la respuesta 
        $response->format = Response::FORMAT_JSON; //Le damos formato a la respuesta
        // se manda la viriable a la vista del boton
        $response->data = ['html' => $this->renderPartial('mostrar')]; //Renderizamos parcial
        return $response;
    }

    // ELIMINA UN CAMPO DE LA TABLA TARJETA
    public function actionBtneliminar()
    {
      // llega el id del js 
      $id = $this->request->post('id');
      //se hace una consulta para que traiga el id del que se registra
      $this->findModel($id)->delete();
    //   ->where(['tar_fkusuario' => Usuario::usuario()->usu_id  and  'tar_id'=>$id ])->one()

        $response = Yii::$app->response; //Obtenemos los datos de la respuesta 
        $response->format = Response::FORMAT_JSON; //Le damos formato a la respuesta
        // se manda la viriable a la vista del boton
        $response->data = ['html' => $this->renderPartial('mostrar')]; //Renderizamos parcial
        return $response;
    }

}
