<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Producto;
use yii\web\UploadedFile;
use app\models\ProductoSearch;
use yii\web\NotFoundHttpException;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
{
    public $freeAccessActions = ['productos'];

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
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producto model.
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
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Producto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $image = UploadedFile::getInstance($model, 'img');
                if (!is_null($image)) {
                    $ext = end((explode(".", $image->name)));
                    $model->pro_imagen = $model->pro_fktienda . '_' . Yii::$app->security->generateRandomString() . ".{$ext}";
                    $path = Yii::$app->basePath . '/web/img/producto/' . $model->pro_imagen;
                    if ($image->saveAs($path) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->pro_id]);
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,

        ]);
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $image = UploadedFile::getInstance($model, 'img');
            if (!is_null($image)) {
                $path = Yii::$app->basePath . '/web/img/producto/' . $model->pro_imagen;
                $image->saveAs($path);
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->pro_id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Producto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (file_exists(Yii::$app->basePath . '/web/img/producto/' . $model->pro_imagen)) {
            unlink(Yii::$app->basePath . '/web/img/producto/' . $model->pro_imagen);
        }

        $model->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionProductos($producto = null, $orden = null)
    {
        $model = new Producto();
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $producto, $orden);

        // if ($num == 1){
        //     $dataProvider->query->orderBy(['pro_precio'=> SORT_DESC])->all();
        // }

        // $dataProvider->pagination = ([
        //     'pageSize' => 6,
        // ]);

        return $this->render('productoVis', compact('searchModel','dataProvider', 'model'));
    }

    public function actionProductoitem()
    {
        return $this->render('productoItem');
    }

    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // public function actionPrueba()
    // {
    //     $searchModel = new ProductoSearch();
    //     $dataProvider = $searchModel->search($this->request->queryParams);

    //     return $this->render('filtro', [
    //         'searchModel' => $searchModel,
    //        'dataProvider' => $dataProvider,
    //     ]);
    // }

    public function actionDetalles($id)
    {
        $productos = Producto::findOne(['pro_id' => $id]);
        return $this->render('detalles', compact('productos'));
    }
}
