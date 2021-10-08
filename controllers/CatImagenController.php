<?php

namespace app\controllers;

use app\models\CatImagen;
use app\models\CatImagenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatImagenController implements the CRUD actions for CatImagen model.
 */
class CatImagenController extends Controller
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
     * Lists all CatImagen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatImagenSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatImagen model.
     * @param int $ima_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ima_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ima_id),
        ]);
    }

    /**
     * Creates a new CatImagen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatImagen();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ima_id' => $model->ima_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatImagen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ima_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ima_id)
    {
        $model = $this->findModel($ima_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ima_id' => $model->ima_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatImagen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ima_id Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ima_id)
    {
        $this->findModel($ima_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatImagen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ima_id Id
     * @return CatImagen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ima_id)
    {
        if (($model = CatImagen::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
