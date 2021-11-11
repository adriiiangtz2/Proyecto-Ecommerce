<?php

namespace app\controllers;

use Yii;
use app\models\Carro;
use yii\web\Response;
use app\models\Usuario;
use yii\web\Controller;
use app\models\Producto;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\CarritoDetalle;
use yii\web\NotFoundHttpException;
use app\models\CarritoDetalleSearch;

/**
 * CarritoDetalleController implements the CRUD actions for CarritoDetalle model.
 */
class CarritoDetalleController extends Controller
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
     * Lists all CarritoDetalle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarritoDetalleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CarritoDetalle model.
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
     * Creates a new CarritoDetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CarritoDetalle();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->cardet_id]);
            }
        } else {
            $model->loadDefaultValues();
        }
     
      /*  return $this->render('create', [
            'model' => $model,
        ]); */
        
        return $this->render('create', compact('model'));
    }

    /**
     * Updates an existing CarritoDetalle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cardet_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CarritoDetalle model.
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

    public function actionCarrito()
    {
        return $this->render('carrito');
    }
    public function actionCheckout()
    {
        $model = new Carro();
        $carro = Carro::carro();
       
        if ($this->request->isPost){

         if( $model->load($this->request->post()) ) {
            $carro -> car_fkmetodo = $model -> car_fkmetodo;
            $carro -> car_fkdomicilio = $model -> car_fkdomicilio;
            $carro -> car_fkenvio = $model -> car_fkenvio;
            $carro -> car_estatus = 'Pagado';
            $carro->save();

            
            return $this->redirect('/');
        }
    }

        return $this->render('checkout', compact('model'));
/*         return $this->render('checkout'); */
    }
    public function actionConfirmacion()
    {
        return $this->render('confirmacion');
    }
    public function actionRegistrar()
    {
        $id=$this->request->post('id');
        $carDetalle = CarritoDetalle::find()->where(['cardet_id' => $id]) -> one(); 
        $precio = Producto::find()->where(['pro_id' => $carDetalle -> cardet_fkproducto])->one()->pro_precio;
        $carDetalle -> cardet_cantidad = $this->request->post('cantidad');
        $total = $precio* $carDetalle -> cardet_cantidad;
        $carDetalle -> cardet_precio = $total;
        $carDetalle -> save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON; 
        $response->data = ['html' => $this->renderPartial('carrito')];
        return $response;
    }
    public function actionEliminar()
    {
        $id=$this->request->post('id');
        $carDetalle = CarritoDetalle::find()->where(['cardet_id' => $id]) -> one(); 
        $carDetalle -> cardet_estatus = 0;
        $carDetalle -> save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON; 
        $response->data = ['html' => $this->renderPartial('carrito')];
        return $response;
    }
    public function actionEditarDomicilio()
    {
        $carro = Carro::carro();
        $id=$this->request->post('id');
        $carro->car_fkdomicilio = $id;
        $carro->save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = ['html' => $this->renderPartial('domusu')];
        return $response;
    }
    public function actionEditarTarjeta()
    {
        $carro = Carro::carro();
        $id=$this->request->post('id');
        $carro->car_fk = $id;
        $carro->save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = ['html' => $this->renderPartial('tarusu')];
        return $response;
    }
    public function actionEditarEnvio()
    {
        $carro = Carro::carro();
        $id=$this->request->post('id');
        $carro->car_fkenvio = $id;
        $carro->save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = ['html' => $this->renderPartial('envusu')];
        return $response;
    }
    /**
     * Finds the CarritoDetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CarritoDetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CarritoDetalle::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
