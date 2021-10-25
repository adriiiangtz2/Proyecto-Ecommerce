<?php

namespace app\controllers;

use app\models\CatMunicipios;
use app\models\CatMunicipiosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatMunicipiosController implements the CRUD actions for CatMunicipios model.
 */
class CatMunicipiosController extends Controller
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
     * Lists all CatMunicipios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatMunicipiosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single CatMunicipios model.
     * @param integer $mun_id
     * @param integer $mun_fkestado
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($mun_id, $mun_fkestado)
    {
        return $this->render('view', [
            'model' => $this->findModel($mun_id, $mun_fkestado),
        ]);
    }

    /**
     * Creates a new CatMunicipios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatMunicipios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'mun_id' => $model->mun_id, 'mun_fkestado' => $model->mun_fkestado]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatMunicipios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $mun_id
     * @param integer $mun_fkestado
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($mun_id, $mun_fkestado)
    {
        $model = $this->findModel($mun_id, $mun_fkestado);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'mun_id' => $model->mun_id, 'mun_fkestado' => $model->mun_fkestado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatMunicipios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $mun_id
     * @param integer $mun_fkestado
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($mun_id, $mun_fkestado)
    {
        $this->findModel($mun_id, $mun_fkestado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatMunicipios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $mun_id
     * @param integer $mun_fkestado
     * @return CatMunicipios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($mun_id, $mun_fkestado)
    {
        if (($model = CatMunicipios::findOne(['mun_id' => $mun_id, 'mun_fkestado' => $mun_fkestado])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
