<?php

namespace app\controllers;

use Yii;
use app\models\Carro;
use app\models\Envio;
use yii\web\Response;
use app\models\Usuario;
use yii\web\Controller;
use app\models\Producto;
use app\models\CatTarjeta;
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
            'ghost-access' => [
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
    public function actionAgregarProducto()
    {
        $id = $this->request->post('id');
        $producto = Producto::findOne(['pro_id' => $id]);
        if (empty(Carro::carro())) {
            $carro = new Carro();
            $carro->car_iva = 0.16 * $producto->pro_precio;
            $carro->car_fecha = date('Y-m-d H:i:s');
            $carro->car_estatus = 'Apartado';
            $carro->car_fkusuario = Usuario::usuario()->usu_id;
            $carro->car_fkmetodo = 2;
            $carro->car_fkdomicilio = CarritoDetalle::domicilioPredeterminado()->dom_id;
            $carro->car_fkenvio = Envio::find()->one()->env_id;
            $carro->car_fktarjeta = CatTarjeta::find()->one()->tar_id;
            $carro->save();
            $carrito = new CarritoDetalle();
            $carrito->cardet_cantidad = 1;
            $carrito->cardet_precio = $producto->pro_precio;
            $carrito->cardet_fkproducto = $id;
            $carrito->cardet_fkcarro = $carro->car_id;
            $carrito->cardet_estatus = 1;
            $carrito->save();
        } else {
            if (empty(CarritoDetalle::productoRepetido($id))) {
                $carrito = new CarritoDetalle();
                $carrito->cardet_precio = $producto->pro_precio;
                $carrito->cardet_fkproducto = $id;
                $carrito->cardet_fkcarro = Carro::carro()->car_id;
                $carrito->cardet_estatus = 1;
                $carrito->cardet_cantidad = 1;
                $carrito->save();
            } else {
                $carritoRep = CarritoDetalle::productoRepetido($id);
                $carritoRep -> cardet_cantidad = $carritoRep -> cardet_cantidad + 1;
                $carritoRep -> cardet_precio = $carritoRep -> cardet_cantidad * $producto->pro_precio;
                $carritoRep -> cardet_estatus = 1;
                $carritoRep -> save();
            }
        }
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = ['html' => CarritoDetalle::carritoContador()];
        return $response;
    }
    public function actionCheckout()
    {
        $model = new Carro();
        $carro = Carro::carro();

        if ($this->request->isPost) {

            if ($model->load($this->request->post())) {
                $carro->car_fkmetodo = $model->car_fkmetodo;
                $carro->car_fkdomicilio = $model->car_fkdomicilio;
                $carro->car_fkenvio = $model->car_fkenvio;
                $carro->car_estatus = 'Pagado';
                $carro->save();


                return $this->redirect('/');
            }
        }

        return $this->render('checkout', compact('model'));
        /*         return $this->render('checkout'); */
    }
    public function actionFinalizarPago()
    {
        /* $id = $this->request->post('id'); */
        $carro = Carro::carro();
        $carro->car_estatus = 'Pagado';
        $carro->car_fecha = date('Y-m-d H:i:s');
        $carro->car_total = $this->request->post('total');
        $carro->car_iva = $this->request->post('iva');
        $carro->save();
    }
    public function actionConfirmacion()
    {
        return $this->render('confirmacion');
    }
    public function actionRegistrar()
    {
        $id = $this->request->post('id');
        $carDetalle = CarritoDetalle::find()->where(['cardet_id' => $id])->one();
        $precio = Producto::find()->where(['pro_id' => $carDetalle->cardet_fkproducto])->one()->pro_precio;
        $carDetalle->cardet_cantidad = $this->request->post('cantidad');
        $total = $precio * $carDetalle->cardet_cantidad;
        $carDetalle->cardet_precio = $total;
        $carDetalle->save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = ['html' => $this->renderPartial('carrito'),'contador'=>CarritoDetalle::carritoContador(), 'carfinal' => $this->renderPartial('carrito-final'), 'importefinal' => $this->renderPartial('finalizar')];
        return $response;
    }
    public function actionEliminar()
    {
        $id = $this->request->post('id');
        $carDetalle = CarritoDetalle::find()->where(['cardet_id' => $id])->one();
        $carDetalle->cardet_estatus = 0;
        $carDetalle->cardet_cantidad = 0;
        $carDetalle->save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = ['html' => $this->renderPartial('carrito'), 'carfinal' => $this->renderPartial('carrito-final')];
        return $response;
    }
    public function actionEditarDomicilio()
    {
        $carro = Carro::carro();
        $id = $this->request->post('id');
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
        $id = $this->request->post('id');
        $carro->car_fktarjeta = $id;
        $carro->save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = ['html' => $this->renderPartial('tarusu')];
        return $response;
    }
    public function actionEditarEnvio()
    {
        $carro = Carro::carro();
        $id = $this->request->post('id');
        $carro->car_fkenvio = $id;
        $carro->save();
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = ['html' => $this->renderPartial('envusu'), 'importefinal' => $this->renderPartial('finalizar')];
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
